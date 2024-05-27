<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Anand\LaravelPaytmWallet\Facades\PaytmWallet;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Transactions;
use paytm\paytmchecksum\PaytmChecksum;
use App\Lib\PaymentEncode;
use App\Models\ApiSettings;

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

        $settings = ApiSettings::first();
        // $registerFormData = $user_data->fData;
        // $createdUserData = $user_data->uData;
        //dd($registerFormData, $createdUserData);
        // dd(json_decode($user_id));
        // $this->pay($user_id);
        $createdUserData = User::find($user_id);
        // dd($createdUserData, $registerFormData);
        $paymentEncode = new PaymentEncode();
        $paramList = array();
        $MSISDN = $createdUserData->phone_number;
        $EMAIL = $createdUserData->email;
        // Generate unique values

        $ORDER_ID = strval(rand(10000, 99999999));
        $CUST_ID = "CUST" . $createdUserData->id;
        // Required parameters for Paytm
        $paramList["MID"] = isset($settings->merchant_id) ? $settings->merchant_id : '';//env('PAYTM_MERCHANT_ID')
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
        $checkSum = $paymentEncode->getChecksumFromArray($paramList, 'BvzNBxT3#&%&L@vO');
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
        $checkSum = $paymentEncode->getChecksumFromArray($paramList, 'BvzNBxT3#&%&L@vO');
        return view('paytm.paytm', ['paramList' => $paramList, 'checkSum' => $checkSum]);
        //dd($checkSum); 

    }





    // Handle the payment callback for registeration
    public function paymentCallback(Request $request)
    {
        // Decode the JSON data from the request
        $data = $request->json()->all();

        // Debugging: dump and die to see the data structure
        dd($_REQUEST);

        // array:13 [▼ // app\Http\Controllers\PaytmController.php:114
        //             "BANKTXNID" => "414635568633"
        //             "CHECKSUMHASH" => "ho85vpqlgXCBsWfzALDDULHBXbIKCYQ4LWMCC0rareKn7uVZFM2V/+V4OUJNs/fAdzujmrtf+ZyZszg7pEoopdkIz/W12L9TkiKO0cH4zl4="
        //             "CURRENCY" => "INR"
        //             "GATEWAYNAME" => "PPBL"
        //             "MID" => "HVRMQv69972580638511"
        //             "ORDERID" => "42232176"
        //             "PAYMENTMODE" => "UPI"
        //             "RESPCODE" => "01"
        //             "RESPMSG" => "Txn Success"
        //             "STATUS" => "TXN_SUCCESS"
        //             "TXNAMOUNT" => "1.00"
        //             "TXNDATE" => "2024-05-25 13:02:13.0"
        //             "TXNID" => "20240525210600000001112136305272339"
        //         ]

        // Extract the necessary information from the data
        $responseTimestamp = $data['head']['responseTimestamp'];
        $version = $data['head']['version'];
        $clientId = $data['head']['clientId'];
        $signature = $data['head']['signature'];

        $resultStatus = $data['body']['resultInfo']['resultStatus'];
        $resultCode = $data['body']['resultInfo']['resultCode'];
        $resultMsg = $data['body']['resultInfo']['resultMsg'];

        $txnId = $data['body']['txnId'];
        $bankTxnId = $data['body']['bankTxnId'];
        $orderId = $data['body']['orderId'];
        $txnAmount = $data['body']['txnAmount'];
        $txnType = $data['body']['txnType'];
        $gatewayName = $data['body']['gatewayName'];
        $bankName = $data['body']['bankName'];
        $mid = $data['body']['mid'];
        $paymentMode = $data['body']['paymentMode'];
        $refundAmt = $data['body']['refundAmt'];
        $txnDate = $data['body']['txnDate'];
        $authRefId = $data['body']['authRefId'];

        // Process the payment information as needed
        // For example, update the order status in the database
        // Order::where('order_id', $orderId)->update(['status' => $resultStatus]);
        if ($resultStatus == 'TXN_SUCCESS') {

 
            $newTransaction = Transactions::create([

                'user_id' => $clientId,
                'bank_id' => $bankName,
                'puc_id' => $orderId,
                'amount' => $txnAmount,
                'transaction_number' => $txnId,
                'status' => 1,
                'transaction_status' => $resultStatus,
                'date' => date('Y-m-d'),

            ]);

            //activate the status of the user here 
            $user = User::find($clientId);

            if ($user) {
                $user->status = 'active';
                $user->save();
            }

            // Return a success response

        } elseif ($resultStatus == 'TXN_FAILURE') {
            $newTransaction = Transactions::create([

                'user_id' => $clientId,
                'bank_id' => $bankName,
                'puc_id' => $orderId,
                'amount' => $txnAmount,
                'transaction_number' => $txnId,
                'status' => 2,
                'transaction_status' => $resultStatus,
                'date' => date('Y-m-d'),

            ]);
        } else {

            $newTransaction = Transactions::create([
                'user_id' => $clientId,
                'bank_id' => $bankName,
                'puc_id' => $orderId,
                'amount' => $txnAmount,
                'transaction_number' => $txnId,
                'status' => 2,
                'transaction_status' => $resultStatus,
                'date' => date('Y-m-d'),

            ]);
        }
        // Return a response if needed
        return redirect()->to('login');
    }





    /////////////////////////////////////////////////////////////

    function addWalletOnline($amount)
    {

        $settings = ApiSettings::first();
        // $registerFormData = $user_data->fData;
        // $createdUserData = $user_data->uData;
        //dd($registerFormData, $createdUserData);
        // dd(json_decode($user_id));
        // $this->pay($user_id);
        $createdUserData = User::find(Auth::user()->id);
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
        $paramList["TXN_AMOUNT"] = $amount;
        $paramList["WEBSITE"] = "DEFAULT";
        $paramList["CALLBACK_URL"] = route('status.online.addwallet');
        $paramList["MSISDN"] = $MSISDN; // Mobile number of customer 
        $paramList["VERIFIED_BY"] = "EMAIL";
        $paramList["IS_USER_VERIFIED"] = "YES";
        // dd($paramList, env('PAYTM_MERCHANT_ID'));
        $checkSum = $paymentEncode->getChecksumFromArray($paramList, 'BvzNBxT3#&%&L@vO');
        return view('paytm.paytm', ['paramList' => $paramList, 'checkSum' => $checkSum]);
    }






    public function paymentCallbackAddWallet(Request $request)
    {
        // Decode the JSON data from the request
        $data = $request->json()->all();

        // Debugging: dump and die to see the data structure
        dd($data);

        // Extract the necessary information from the data
        $responseTimestamp = $data['head']['responseTimestamp'];
        $version = $data['head']['version'];
        $clientId = $data['head']['clientId'];
        $signature = $data['head']['signature'];

        $resultStatus = $data['body']['resultInfo']['resultStatus'];
        $resultCode = $data['body']['resultInfo']['resultCode'];
        $resultMsg = $data['body']['resultInfo']['resultMsg'];

        $txnId = $data['body']['txnId'];
        $bankTxnId = $data['body']['bankTxnId'];
        $orderId = $data['body']['orderId'];
        $txnAmount = $data['body']['txnAmount'];
        $txnType = $data['body']['txnType'];
        $gatewayName = $data['body']['gatewayName'];
        $bankName = $data['body']['bankName'];
        $mid = $data['body']['mid'];
        $paymentMode = $data['body']['paymentMode'];
        $refundAmt = $data['body']['refundAmt'];
        $txnDate = $data['body']['txnDate'];
        $authRefId = $data['body']['authRefId'];

        // Process the payment information as needed
        // For example, update the order status in the database
        // Order::where('order_id', $orderId)->update(['status' => $resultStatus]);
        if($resultStatus == 'TXN_SUCCESS'){
            $newTransaction = Transactions::create([
                'type'=>'2',
                'transaction_type'=>'1',
                'user_id' => $clientId,
                'bank_id' => $bankName,
                'puc_id' => $orderId,
                'amount' => $txnAmount,
                'transaction_number' => $txnId,
                'transaction_remarks' =>'Added by User',
                'status' => 3,
                'transaction_status' => 3,
                'date' => date('Y-m-d'),

            ]);

            //activate the status of the user here 
            $user = User::find($clientId);

           

            // Return a success response

         }
          else {

            $newTransaction = Transactions::create([
                'user_id' => $clientId,
                'bank_id' => $bankName,
                'puc_id' => $orderId,
                'amount' =>0,
                'transaction_number' => $txnId,
                'status' => 2,
                'transaction_status' => $resultStatus,
                'date' => date('Y-m-d'),

            ]);
        }
        // Return a response if needed
        return redirect()->to('wallet');
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
        $str = $this->__callgetArray2StrForVerify($arrayList);
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
}
