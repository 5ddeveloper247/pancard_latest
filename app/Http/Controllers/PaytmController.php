<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Anand\LaravelPaytmWallet\Facades\PaytmWallet;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\TempUsers;
use App\Models\Transactions;
use paytm\paytmchecksum\PaytmChecksum;
use App\Lib\PaymentEncode;
use App\Models\ApiSettings;
use App\Models\Settings;

class PaytmController extends Controller
{

    // Display a form for payment
    public function initiate()
    {
        return view('paytm');
    }


    function doPayment($id)
    {

        $user_id = $id;
        
        $sysSettings = Settings::first();
        $settings = ApiSettings::first();
      
        $createdUserData = TempUsers::find($user_id);
        
        $paymentEncode = new PaymentEncode();
        $paramList = array();
        $MSISDN = $createdUserData->phone_number;
        $EMAIL = $createdUserData->email;
        // Generate unique values

        $ORDER_ID = $user_id != '' ? $user_id : strval(rand(10000, 99999999));
        
        $CUST_ID = "CUST" . $createdUserData->id;
        // Required parameters for Paytm
        $paramList["MID"] = isset($settings->merchant_id) ? $settings->merchant_id : '';//env('PAYTM_MERCHANT_ID')
        $paramList["ORDER_ID"] = $ORDER_ID;
        $paramList["CUST_ID"] = $CUST_ID;
        $paramList["INDUSTRY_TYPE_ID"] = "Retail";
        $paramList["CHANNEL_ID"] = "WEB";
        $paramList["TXN_AMOUNT"] = isset($sysSettings->retailer_rate) ? $sysSettings->retailer_rate : 1;
        $paramList["WEBSITE"] = "DEFAULT";
        $paramList["CALLBACK_URL"] = route('status');
        $paramList["MSISDN"] = $MSISDN; // Mobile number of customer 
        $paramList["VERIFIED_BY"] = "EMAIL";
        $paramList["IS_USER_VERIFIED"] = "YES";
        // dd($paramList, env('PAYTM_MERCHANT_ID'));
        $checkSum = $paymentEncode->getChecksumFromArray($paramList, isset($settings->merchant_key) ? $settings->merchant_key : '');
        return view('paytm.paytm', ['paramList' => $paramList, 'checkSum' => $checkSum]);
    }

    // Handle the payment request 
    public function pay($userId)
    {

        $settings = ApiSettings::first();
        $createdUserData = User::find($userId);
        // dd($createdUserData, $registerFormData);
        $paymentEncode = new PaymentEncode();
        $paramList = array();
        $MSISDN = $createdUserData->phone_number;
        $EMAIL = $createdUserData->email;
        // Generate unique values

        $ORDER_ID = strval(rand(10000, 99999999));
        $CUST_ID = "CUST" . $createdUserData->id;
        // Required parameters for Paytm
        $paramList["MID"] = isset($settings->merchant_id) ? $settings->merchant_id : '';//env('PAYTM_MERCHANT_ID');
        $paramList["ORDER_ID"] = $ORDER_ID;
        $paramList["CUST_ID"] = $CUST_ID;
        $paramList["INDUSTRY_TYPE_ID"] = "Retail";
        $paramList["CHANNEL_ID"] = "WEB";
        $paramList["TXN_AMOUNT"] = 1;
        $paramList["WEBSITE"] = "DEFAULT";
        $paramList["CALLBACK_URL"] = route('status');
        $paramList["MSISDN"] = $MSISDN; // Mobile number of customer 
        $paramList["VERIFIED_BY"] = "EMAIL";
        $paramList["IS_USER_VERIFIED"] = "YES";
        // dd($paramList, env('PAYTM_MERCHANT_ID'));
        $checkSum = $paymentEncode->getChecksumFromArray($paramList, isset($settings->merchant_key) ? $settings->merchant_key : '');
        return view('paytm.paytm', ['paramList' => $paramList, 'checkSum' => $checkSum]);
        //dd($checkSum); 

    }

    // Handle the payment callback for registeration
    public function paymentCallback(Request $request)
    {
        $settings = ApiSettings::first();
        $merchant_id = isset($settings->merchant_id) ? $settings->merchant_id : '';
        
        // Debugging: dump and die to see the data structure
        
        $responseData = $_REQUEST;
        // dd($responseData);
        $paytmChecksum = isset($_REQUEST["CHECKSUMHASH"]) ? $_REQUEST["CHECKSUMHASH"] : ""; //Sent by Paytm pg
        $verify = $this->verifychecksum_e($responseData, $merchant_id, $paytmChecksum);

        // Extract the necessary information from the data
        $bankTrxId = isset($responseData['BANKTXNID']) ? $responseData['BANKTXNID'] : '';
        $checksum = isset($responseData['CHECKSUMHASH']) ? $responseData['CHECKSUMHASH'] : '';
        $currency = isset($responseData['CURRENCY']) ? $responseData['CURRENCY'] : '';
        $gatewayName = isset($responseData['GATEWAYNAME']) ? $responseData['GATEWAYNAME'] : '';
        $mid = isset($responseData['MID']) ? $responseData['MID'] : '';
        $orderId = isset($responseData['ORDERID']) ? $responseData['ORDERID'] : '';
        $payMode = isset($responseData['PAYMENTMODE']) ? $responseData['PAYMENTMODE'] : '';
        $respCode = isset($responseData['RESPCODE']) ? $responseData['RESPCODE'] : '';
        $respMsg = isset($responseData['RESPMSG']) ? $responseData['RESPMSG'] : '';
        $trxStatus = isset($responseData['STATUS']) ? $responseData['STATUS'] : '';
        $trxAmount = isset($responseData['TXNAMOUNT']) ? $responseData['TXNAMOUNT'] : '';
        $trxDate = isset($responseData['TXNDATE']) ? $responseData['TXNDATE'] : '';
        $trxId = isset($responseData['TXNID']) ? $responseData['TXNID'] : '';

        if ($responseData == 'TXN_SUCCESS') {

            // Fetch the data from temp_user table by the specific ID
            $tempUser = TempUsers::where('id', $orderId)->first();
            
            $userData = $tempUser->toArray();

            // Remove the id and timestamps from the data
            unset($userData['id'], $userData['created_at'], $userData['updated_at']);

            // Add or modify specific attributes
            $userData['status'] = 'active';

            // Create a new User instance and fill it with the data
            $user = new User();
            $user->fill($userData);
            // Save the new user record
            $user->save();
            
            TempUsers::where('id', $orderId)->delete();

            $transaction = new Transactions;
            $transaction->type = '1'; // 1=>credit, 2=>debit
            $transaction->transaction_type = '1'; // 1=>online, 2=>manual
            $transaction->user_id = $user->id;
            $transaction->bank_id = null;
            $transaction->puc_id = null;
            $transaction->amount = $trxAmount;
            $transaction->transaction_number = $trxId;
            $transaction->transaction_remarks = 'User Register';
            $transaction->status = '3'; //  1=>pending, 2=>rejected , 3=>approved
            $transaction->transaction_status = '3'; //  1=>pending, 2=>rejected , 3=>approved
            $transaction->transaction_checksum = $checksum;
            $transaction->transaction_response = json_encode($responseData, true);
            $transaction->date = date('Y-m-d');
            $transaction->save();

            // send email code
            $body = view('emails.registration', $user);
            $userEmailsSend[] = $user->email;
            // to username, to email, from username, subject, body html
            $response = sendMail($user->name, $userEmailsSend, 'PUCZONE', 'Registration', $body);

            $encodedId = base64_encode($transaction->id);
            $url = route('payment_success', ['id' => $encodedId]);
            return redirect($url);
            
        } else {

            $url = route('payment_fail');
            return redirect($url);
        
        }
        // Return a response if needed
        return redirect()->to('login');
    }

    // online paymment wallet
    function addWalletOnline($amount)
    {
        if(isset(Auth::user()->id)){
            $settings = ApiSettings::first();
        
            $createdUserData = User::find(Auth::user()->id);
            
            $transaction = new Transactions;
            $transaction->type = '1'; // 1=>credit, 2=>debit
            $transaction->transaction_type = '1'; // 1=>online, 2=>manual
            $transaction->user_id = Auth::user()->id;
            $transaction->bank_id = null;
            $transaction->puc_id = null;
            $transaction->amount = $amount;
            $transaction->transaction_number = null;
            $transaction->transaction_remarks = 'Added by user';
            $transaction->status = '1'; //  1=>pending, 2=>rejected , 3=>approved
            $transaction->transaction_status = '1'; //  1=>pending, 2=>rejected , 3=>approved
            $transaction->transaction_checksum = null;
            $transaction->transaction_response = null;
            $transaction->date = date('Y-m-d');
            $transaction->save();

            $paymentEncode = new PaymentEncode();
            $paramList = array();
            $MSISDN = $createdUserData->phone_number;
            $EMAIL = $createdUserData->email;
            // Generate unique values

            $ORDER_ID = isset($transaction->id) ? $transaction->id : strval(rand(10000, 99999999));
            $CUST_ID = "CUST" . $createdUserData->id;
            // Required parameters for Paytm
            $paramList["MID"] = isset($settings->merchant_id) ? $settings->merchant_id : '';//env('PAYTM_MERCHANT_ID');
            $paramList["ORDER_ID"] = $ORDER_ID;
            $paramList["CUST_ID"] = $CUST_ID;
            $paramList["INDUSTRY_TYPE_ID"] = "Retail";
            $paramList["CHANNEL_ID"] = "WEB";
            $paramList["TXN_AMOUNT"] = $amount;
            $paramList["WEBSITE"] = "DEFAULT";
            $paramList["CALLBACK_URL"] = route('status.online.addwallet');
            $paramList["MSISDN"] = $MSISDN; // Mobile number of customer 
            $paramList["VERIFIED_BY"] = "EMAIL";
            $paramList["IS_USER_VERIFIED"] = "YES";
            // dd($paramList, env('PAYTM_MERCHANT_ID'));
            $checkSum = $paymentEncode->getChecksumFromArray($paramList, isset($settings->merchant_key) ? $settings->merchant_key : '');

            Transactions::where('id', $transaction->id)->update([
                'transaction_checksum' => $checkSum,
            ]);

            return view('paytm.paytm', ['paramList' => $paramList, 'checkSum' => $checkSum]);
        }else{
            return redirect('login');
        }
    }

    public function paymentCallbackAddWallet(Request $request)
    {
        $settings = ApiSettings::first();
        $merchant_id = isset($settings->merchant_id) ? $settings->merchant_id : '';
        
        // Debugging: dump and die to see the data structure
        
        $responseData = $_REQUEST;
        $paytmChecksum = isset($_REQUEST["CHECKSUMHASH"]) ? $_REQUEST["CHECKSUMHASH"] : ""; //Sent by Paytm pg
        $verify = $this->verifychecksum_e($responseData, $merchant_id, $paytmChecksum);

        // Extract the necessary information from the data
        $bankTrxId = isset($responseData['BANKTXNID']) ? $responseData['BANKTXNID'] : '';
        $checksum = isset($responseData['CHECKSUMHASH']) ? $responseData['CHECKSUMHASH'] : '';
        $currency = isset($responseData['CURRENCY']) ? $responseData['CURRENCY'] : '';
        $gatewayName = isset($responseData['GATEWAYNAME']) ? $responseData['GATEWAYNAME'] : '';
        $mid = isset($responseData['MID']) ? $responseData['MID'] : '';
        $orderId = isset($responseData['ORDERID']) ? $responseData['ORDERID'] : '';
        $payMode = isset($responseData['PAYMENTMODE']) ? $responseData['PAYMENTMODE'] : '';
        $respCode = isset($responseData['RESPCODE']) ? $responseData['RESPCODE'] : '';
        $respMsg = isset($responseData['RESPMSG']) ? $responseData['RESPMSG'] : '';
        $trxStatus = isset($responseData['STATUS']) ? $responseData['STATUS'] : '';
        $trxAmount = isset($responseData['TXNAMOUNT']) ? $responseData['TXNAMOUNT'] : '';
        $trxDate = isset($responseData['TXNDATE']) ? $responseData['TXNDATE'] : '';
        $trxId = isset($responseData['TXNID']) ? $responseData['TXNID'] : '';


        // Process the payment information as needed
        if($trxStatus == 'TXN_SUCCESS'){
            
            // success response
            $transaction = Transactions::where('id', $orderId)->with(['createdByUser'])->first();

            if(isset($transaction->id)){
                $transaction->transaction_number = $trxId;
                $transaction->status = 3;
                $transaction->transaction_status = 3;
                $transaction->transaction_response = json_encode($responseData, true);
                $transaction->save();

                $user = $transaction->createdByUser;
                $newBalance = $transaction->amount + $user['balance'];
                User::where('id', $user['id'])->update([
                    'balance' => $newBalance,
                ]);
                Auth::login($user);
                $request->session()->put('user', $user);
            }

            $encodedId = base64_encode($transaction->id);
            $url = route('payment_success', ['id' => $encodedId]);
            return redirect($url);

        } else {

            // failed response
            $transaction = Transactions::where('id', $orderId)->with(['createdByUser'])->first();

            if(isset($transaction->id)){
                $transaction->transaction_number = $trxId;
                $transaction->status = 2;
                $transaction->transaction_status = 2;
                $transaction->transaction_response = json_encode($responseData, true);
                $transaction->save();

                $user = $transaction->createdByUser;
                Auth::login($user);
                $request->session()->put('user', $user);
            }
            
            $encodedId = base64_encode($transaction->id);
            $url = route('payment_fail', ['id' => $encodedId]);
            return redirect($url);
        }
    }

    public function payment_success($encodedId){
        
        // Decode the base64 encoded ID
        $decodedId = base64_decode($encodedId);

        // Fetch the model using the decoded ID
        $transaction = Transactions::where('id', $decodedId)->with(['createdByUser','createdByUser.state','createdByUser.city','createdByUser.area'])->first();

        // dd($transaction);
        if(isset($transaction->id)){
            $data['transaction'] = $transaction;
            // Return a view with the model data
            return view('user/payment_success')->with($data);
        }else{
            echo 'Invalid URL!';
        }
    }

    public function payment_failed($encodedId=''){
        
        if($encodedId != ''){
            // Decode the base64 encoded ID
            $decodedId = base64_decode($encodedId);

            // Fetch the model using the decoded ID
            $transaction = Transactions::where('id', $decodedId)->with(['createdByUser','createdByUser.state','createdByUser.city','createdByUser.area'])->first();

            // dd($transaction);
            if(isset($transaction->id)){
                $data['transaction'] = $transaction;
                // Return a view with the model data
                return view('user/payment_failed')->with($data);
            }else{
                echo 'Invalid URL!';
            }
        }else{
            return view('user/payment_failed');
        }
        
    }
    





    ////////////////////////////////////// Checksum functionss ///////////////////////////////////////////////////


    function encrypt_e($input, $ky)
    {
        $key   = html_entity_decode($ky);
        $iv = "@@@@&&&&####$$$$";
        $data = openssl_encrypt($input, "AES-128-CBC", $key, 0, $iv);
        return $data;
    }

    function decrypt_e($crypt, $ky)
    {
        $key   = html_entity_decode($ky);
        $iv = "@@@@&&&&####$$$$";
        $data = openssl_decrypt($crypt, "AES-128-CBC", $key, 0, $iv);
        return $data;
    }

    function generateSalt_e($length)
    {
        $random = "";
        srand((float) microtime() * 1000000);

        $data = "AbcDE123IJKLMN67QRSTUVWXYZ";
        $data .= "aBCdefghijklmn123opq45rs67tuv89wxyz";
        $data .= "0FGH45OP89";

        for ($i = 0; $i < $length; $i++) {
            $random .= substr($data, (rand() % (strlen($data))), 1);
        }

        return $random;
    }

    function checkString_e($value)
    {
        if ($value == 'null')
            $value = '';
        return $value;
    }

    function getChecksumFromArray($arrayList, $key, $sort = 1)
    {
        if ($sort != 0) {
            ksort($arrayList);
        }
        $str = $this->getArray2Str($arrayList);
        $salt = $this->generateSalt_e(4);
        $finalString = $str . "|" . $salt;
        $hash = hash("sha256", $finalString);
        $hashString = $hash . $salt;
        $checksum = $this->encrypt_e($hashString, $key);
        return $checksum;
    }
    function getChecksumFromString($str, $key)
    {

        $salt = $this->generateSalt_e(4);
        $finalString = $str . "|" . $salt;
        $hash = hash("sha256", $finalString);
        $hashString = $hash . $salt;
        $checksum = $this->encrypt_e($hashString, $key);
        return $checksum;
    }

    function verifychecksum_e($arrayList, $key, $checksumvalue)
    {
        $arrayList = $this->removeCheckSumParam($arrayList);
        ksort($arrayList);
        $str = $this->getArray2StrForVerify($arrayList);
        $paytm_hash = $this->decrypt_e($checksumvalue, $key);
        $salt = substr($paytm_hash, -4);

        $finalString = $str . "|" . $salt;

        $website_hash = hash("sha256", $finalString);
        $website_hash .= $salt;

        $validFlag = "FALSE";
        if ($website_hash == $paytm_hash) {
            $validFlag = "TRUE";
        } else {
            $validFlag = "FALSE";
        }
        return $validFlag;
    }

    
    function getArray2StrForVerify($arrayList)
    {
        $paramStr = "";
        $flag = 1;
        foreach ($arrayList as $key => $value) {
            if ($flag) {
                $paramStr .= $this->checkString_e($value);
                $flag = 0;
            } else {
                $paramStr .= "|" . $this->checkString_e($value);
            }
        }
        return $paramStr;
    }

    function verifychecksum_eFromStr($str, $key, $checksumvalue)
    {
        $paytm_hash = $this->decrypt_e($checksumvalue, $key);
        $salt = substr($paytm_hash, -4);

        $finalString = $str . "|" . $salt;

        $website_hash = hash("sha256", $finalString);
        $website_hash .= $salt;

        $validFlag = "FALSE";
        if ($website_hash == $paytm_hash) {
            $validFlag = "TRUE";
        } else {
            $validFlag = "FALSE";
        }
        return $validFlag;
    }

    function getArray2Str($arrayList)
    {
        $findme   = 'REFUND';
        $findmepipe = '|';
        $paramStr = "";
        $flag = 1;
        foreach ($arrayList as $key => $value) {
            $pos = strpos($value, $findme);
            $pospipe = strpos($value, $findmepipe);
            if ($pos !== false || $pospipe !== false) {
                continue;
            }

            if ($flag) {
                $paramStr .= $this->checkString_e($value);
                $flag = 0;
            } else {
                $paramStr .= "|" . $this->checkString_e($value);
            }
        }
        return $paramStr;
    }

    

    function redirect2PG($paramList, $key)
    {
        $hashString = $this->getchecksumFromArray($paramList, $key);
        $checksum = $this->encrypt_e($hashString, $key);
    }

    function removeCheckSumParam($arrayList)
    {
        if (isset($arrayList["CHECKSUMHASH"])) {
            unset($arrayList["CHECKSUMHASH"]);
        }
        return $arrayList;
    }

    function getTxnStatus($requestParamList)
    {
        return $this->callAPI(env('PAYTM_STATUS_QUERY_URL'), $requestParamList);
    }

    function getTxnStatusNew($requestParamList)
    {
        return $this->callNewAPI(env('PAYTM_STATUS_QUERY_NEW_URL'), $requestParamList);
    }

    function initiateTxnRefund($requestParamList)
    {
        $settings = ApiSettings::first();
        $CHECKSUM = $this->getRefundChecksumFromArray($requestParamList, isset($settings->merchant_key) ? $settings->merchant_key : '', 0); //env('PAYTM_MERCHANT_KEY')
        $requestParamList["CHECKSUM"] = $CHECKSUM;
        return $this->callAPI(env('PAYTM_REFUND_URL'), $requestParamList);
    }

    function callAPI($apiURL, $requestParamList)
    {
        $jsonResponse = "";
        $responseParamList = array();
        $JsonData = json_encode($requestParamList);
        $postData = 'JsonData=' . urlencode($JsonData);
        $ch = curl_init($apiURL);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($ch, CURLOPT_POSTFIELDS, $postData);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt(
            $ch,
            CURLOPT_HTTPHEADER,
            array(
                'Content-Type: application/json',
                'Content-Length: ' . strlen($postData)
            )
        );
        $jsonResponse = curl_exec($ch);
        $responseParamList = json_decode($jsonResponse, true);
        return $responseParamList;
    }

    function callNewAPI($apiURL, $requestParamList)
    {
        $jsonResponse = "";
        $responseParamList = array();
        $JsonData = json_encode($requestParamList);
        $postData = 'JsonData=' . urlencode($JsonData);
        $ch = curl_init($apiURL);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($ch, CURLOPT_POSTFIELDS, $postData);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt(
            $ch,
            CURLOPT_HTTPHEADER,
            array(
                'Content-Type: application/json',
                'Content-Length: ' . strlen($postData)
            )
        );
        $jsonResponse = curl_exec($ch);
        $responseParamList = json_decode($jsonResponse, true);
        return $responseParamList;
    }
    function getRefundChecksumFromArray($arrayList, $key, $sort = 1)
    {
        if ($sort != 0) {
            ksort($arrayList);
        }
        $str = $this->getRefundArray2Str($arrayList);
        $salt = $this->generateSalt_e(4);
        $finalString = $str . "|" . $salt;
        $hash = hash("sha256", $finalString);
        $hashString = $hash . $salt;
        $checksum = $this->encrypt_e($hashString, $key);
        return $checksum;
    }


    function getRefundArray2Str($arrayList)
    {
        $findmepipe = '|';
        $paramStr = "";
        $flag = 1;
        foreach ($arrayList as $key => $value) {
            $pospipe = strpos($value, $findmepipe);
            if ($pospipe !== false) {
                continue;
            }

            if ($flag) {
                $paramStr .= $this->checkString_e($value);
                $flag = 0;
            } else {
                $paramStr .= "|" . $this->checkString_e($value);
            }
        }
        return $paramStr;
    }
    function callRefundAPI($refundApiURL, $requestParamList)
    {
        $jsonResponse = "";
        $responseParamList = array();
        $JsonData = json_encode($requestParamList);
        $postData = 'JsonData=' . urlencode($JsonData);
        $ch = curl_init($apiURL);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($ch, CURLOPT_URL, $refundApiURL);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $postData);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $headers = array();
        $headers[] = 'Content-Type: application/json';
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        $jsonResponse = curl_exec($ch);
        $responseParamList = json_decode($jsonResponse, true);
        return $responseParamList;
    }

    // paytm payment response
//     array:13 [▼ // app\Http\Controllers\PaytmController.php:114
//     "BANKTXNID" => "414635568633"
//     "CHECKSUMHASH" => "ho85vpqlgXCBsWfzALDDULHBXbIKCYQ4LWMCC0rareKn7uVZFM2V/+V4OUJNs/fAdzujmrtf+ZyZszg7pEoopdkIz/W12L9TkiKO0cH4zl4="
//     "CURRENCY" => "INR"
//     "GATEWAYNAME" => "PPBL"
//     "MID" => "HVRMQv69972580638511"
//     "ORDERID" => "42232176"
//     "PAYMENTMODE" => "UPI"
//     "RESPCODE" => "01"
//     "RESPMSG" => "Txn Success"
//     "STATUS" => "TXN_SUCCESS"
//     "TXNAMOUNT" => "1.00"
//     "TXNDATE" => "2024-05-25 13:02:13.0"
//     "TXNID" => "20240525210600000001112136305272339"
// ]
}
