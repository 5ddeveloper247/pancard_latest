<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Spatie\PdfToText\Pdf;
use Maatwebsite\Excel\Facades\Excel;
use Carbon\Carbon;
use App\Models\User;
use App\Models\Settings;
use App\Models\ApiSettings;
use App\Models\Notifications;
use App\Models\Tutorials;
use App\Models\States;
use App\Models\Cities;
use App\Models\Areas;
use App\Models\PucTypes;
use App\Models\PucUserRates;
use App\Models\Puc;
use App\Models\Banks;
use App\Models\Transactions;
use App\Http\Controllers\PaytmController;



class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    protected $paytm;

    // Use dependency injection to bring in the PaymentEncode class
    public function __construct(PaytmController $paytm)
    {
        $this->paytm = $paytm;
    }


    public function index(Request $request)
    {
        $data['page'] = 'Orders';
        return view('admin/orders')->with($data);
    }

    public function users(Request $request)
    {
        $data['states'] = States::where('status', '1')->orderBy('created_at', 'desc')->get();
        $data['puc_types'] = PucTypes::where('status', '1')->get();

        do {
            $username_auto = 'PUCZ' . mt_rand(100000, 999999);
            $existing_number = User::where('username', $username_auto)->first();
        } while ($existing_number);

        $data['username_auto'] = $username_auto;
        $data['page'] = 'Users';

        return view('admin/users')->with($data);
    }

    public function settings(Request $request)
    {
        $data['page'] = 'Settings';
        $data['users'] = User::where('status', 'Active')->whereIn('type', ['user'])->get();
        $data['puc_types'] = PucTypes::where('status', '1')->get();
        return view('admin/settings')->with($data);
    }

    public function analytics()
    {
        $data['page'] = 'Analytics';
        return view('admin/analytics')->with($data);
    }

    public function wallet()
    {
        $data['page'] = 'Wallet';
        $data['banks'] = Banks::where('enable', 1)->orderBy('created_at', 'desc')->get();
        return view('admin/wallet')->with($data);
    }

    public function getBankList()
    {
        $data = Banks::where('enable', 1)->orderBy('created_at', 'desc')->get();
        echo json_encode($data);
    }

    public function getBankDetails(Request $request)
    {

        $bank_id = $request->bank_id;
        $data['bank_detail'] = Banks::where('id', $bank_id)->first();
        return response()->json(['status' => 200, 'message' => "", 'data' => $data]);
    }
    // public function addTransaction(Request $request){
    //     $validatedData = $request->validate([
    //         'selected_bank_id' => 'required',
    //         'utr_no' => 'required|max:100',
    //         'transaction_date' => 'required|date',
    //         'transaction_amount' => 'required|numeric|min:500',

    //     ],
    //     ['selected_bank_id.required' => 'Select bank from dropdown first']);

    //     $transaction = new Transactions;
    //     $transaction->transaction_type = '2';
    //     $transaction->user_id = Auth::id();
    //     $transaction->bank_id = $request->selected_bank_id;
    //     $transaction->amount = $request->transaction_amount;
    //     $transaction->transaction_number = $request->utr_no;
    //     $transaction->status = '1';
    //     $transaction->date = $request->transaction_date;
    //     $transaction->save();
    //     return response()->json(['status' => 200,'message' => "Transaction Added Successfully"]);

    // }

    public function getTransactionHistory()
    {
        $user_id = Auth::id();
        $data['history'] = Transactions::where('user_id', $user_id)->orderBy('created_at', 'desc')->get();
        return response()->json(['status' => 200, 'message' => "", 'data' => $data]);
    }

    public function addBank(Request $request)
    {
        $validatedData = $request->validate([
            'bank_type' => 'required'
        ]);
        if ($request['bank_type'] == '2') {
            $validatedData = $request->validate([
                'bank_type' => 'required',
                'bank_name' => 'required|max:100',
                'holder_name' => 'required|max:100',
                'account_number' => 'required|numeric',
                'ifsc_code' => 'required|string',
            ]);
        }
        if ($request['bank_type'] == '1') {
            $validatedData = $request->validate([
                'upi_id' => 'required|max:100',
                'holder_name' => 'required|max:100',
            ]);
        }

        // Process form submission if validation passes
        $bank = new Banks;
        if ($request['bank_type'] == '1') {
            $bank->upi_id = $request['upi_id'];
            $bank->holder_name = $request['holder_name'];
            $bank->bank_type = $request['bank_type'];
        }
        if ($request['bank_type'] == '2') {
            $bank->bank_type = $request['bank_type'];
            $bank->bank_name = $request['bank_name'];
            $bank->holder_name = $request['holder_name'];
            $bank->account_number = $request['account_number'];
            $bank->ifsc_code = $request['ifsc_code'];
        }

        $bank->created_at = date('Y-m-d H:i:s');
        $bank->updated_at = date('Y-m-d H:i:s');


        // Save the changes
        $bank->save();

        return response()->json(['status' => 200, 'message' => "Bank Information Added Successfully!"]);
    }

    public function deleteBank(Request $request)
    {
        $bank_id = $request->bank_id;
        $record = Banks::where('id', $bank_id)->first();


        if ($record) {
            $record->delete();
            return response()->json(['status' => 200, 'message' => "Bank Deleted Successfully!"]);
        } else {
            return response()->json(['status' => 404, 'message' => "Record Not Found!"], 404);
        }
    }

    public function pendingTransactionsList(Request $request)
    {

        $data['pendingTransactionsList'] = Transactions::where('status', '1')->with(['createdByUser', 'bankName'])->get();
        return response()->json(['status' => 200, 'message' => "", 'data' => $data]);
    }

    public function walletHistory(Request $request)
    {

        $data['walletHistory'] = Transactions::with(['createdByUser', 'bankName'])->orderBy('created_at', 'desc')->get();
        return response()->json(['status' => 200, 'message' => "", 'data' => $data]);
    }

    public function getWalletHistoryFilteredData(Request $request)
    {

        $filterFlag = $request->filterFlag;
        $param1 = $request->param1;
        $param2 = $request->param2;

        if ($filterFlag == '1') {
            $transactions = Transactions::whereDate('created_at', '=', $param1)         // for today  & yesterday
                ->with(['createdByUser', 'bankName'])
                ->orderBy('created_at', 'desc')->get();
        } else if ($filterFlag == '2') {
            $transactions = Transactions::whereYear('created_at', date('Y'))        // for today  & yesterday
                ->whereMonth('created_at', $param1)
                ->with(['createdByUser', 'bankName'])
                ->orderBy('created_at', 'desc')->get();
        } else if ($filterFlag == '3') {
            $transactions = Transactions::whereDate('created_at', '>=', $param1)    // for start date
                ->whereDate('created_at', '<=', $param2)    // for end date
                ->with(['createdByUser', 'bankName'])
                ->orderBy('created_at', 'desc')->get();
        }

        $data['walletHistory'] = $transactions;
        return response()->json(['status' => 200, 'message' => "", 'data' => $data]);
    }

    public function completeTransaction(Request $request)
    {

        $transaction_id = $request->transaction_id;

        $transaction = Transactions::where('id', $transaction_id)->with(['createdByUser'])->first();
        $userDetail = $transaction->createdByUser;
        $newBalance = $transaction->amount + $userDetail['balance'];
        // dd($newBalance);
        Transactions::where('id', $transaction_id)->update([
            'status' => '3',
        ]);
        User::where('id', $userDetail['id'])->update([
            'balance' => $newBalance,
        ]);
        $transaction_updated = Transactions::where('id', $transaction_id)->first();
        $userData = User::where('id', $userDetail['id'])->first();
        $bankData = Banks::where('id', $transaction_updated->bank_id)->first();
        $mailData['bankData'] = $bankData;
        $mailData['userName'] = $userData->name;
        $date = new \DateTime($transaction_updated->date);
        $transaction_updated->date = $date->format('d-m-Y');
        $mailData['transaction'] = $transaction_updated;
        $body = view('emails.transaction', $mailData);
        $userEmailsSend[] = $userData->email;
        // to username, to email, from username, subject, body html
        sendMail($userData->name, $userEmailsSend, 'PUCZONE', 'Transaction Approved', $body); // send_to_name, send_to_email, email_from_name, subject, body

        return response()->json(['status' => 200, 'message' => "Transaction Completed Successfully!"]);
    }

    public function rejectTransaction(Request $request)
    {

        $transaction_id = $request->transaction_id;
        Transactions::where('id', $transaction_id)->update([
            'status' => '2',
        ]);
        $transaction_updated = Transactions::where('id', $transaction_id)->first();
        $userData = User::where('id', $transaction_updated['user_id'])->first();
        $bankData = Banks::where('id', $transaction_updated->bank_id)->first();
        $mailData['bankData'] = $bankData;
        $mailData['userName'] = $userData->name;
        $date = new \DateTime($transaction_updated->date);
        $transaction_updated->date = $date->format('d-m-Y');
        $mailData['transaction'] = $transaction_updated;
        $body = view('emails.transaction', $mailData);
        $userEmailsSend[] = $userData->email;
        // to username, to email, from username, subject, body html
        sendMail($userData->name, $userEmailsSend, 'PUCZONE', 'Transaction Rejected', $body); // send_to_name, send_to_email, email_from_name, subject, body
        return response()->json(['status' => 200, 'message' => "Transaction Rejected Successfully!"]);
    }




    public function login(Request $request)
    {
        $request->session()->forget('user');
        return view('admin/login');
    }

    public function loginSubmit(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {

            $user = Auth::user();
            $request->session()->put('user', $user);
            // Authentication passed...
            return redirect()->intended('/admin/orders');
        }

        $request->session()->flash('error', 'The provided credentials do not match our records.');
        return redirect('admin/login');
    }

    public function logout(Request $request)
    {

        $request->session()->forget('user');

        return redirect('admin');
    }


    public function getSettingsPageData(Request $request)
    {
        $data['settings'] = Settings::first();
        $data['api_settings'] = ApiSettings::first();
        $data['notifications'] = Notifications::orderBy('created_at', 'desc')->get();
        $data['tutorials'] = Tutorials::orderBy('created_at', 'desc')->get();

        return response()->json(['status' => 200, 'data' => $data]);
    }

    public function storeGeneralSettings(Request $request)
    {
        $validatedData = $request->validate([
            'company' => 'required|max:100',
            'websiteTitle' => 'required|max:100',
            'retailerRate' => 'required|numeric',
            'distributorRate' => 'required|numeric',
            'supDistributorRate' => 'required|numeric',
            'apiRate' => 'required|numeric',
            'helplineEmail' => 'required|max:100',
            'helplineNumber' => 'required|numeric',
        ]);

        // Process form submission if validation passes
        $settings = Settings::first();

        if (!isset($settings->id)) {
            $settings = new Settings();
        }

        // Update the settings with the new values
        $settings->company = $request->company;
        $settings->website_title = $request->websiteTitle;
        $settings->retailer_rate = $request->retailerRate;
        $settings->distributor_rate = $request->distributorRate;
        $settings->super_distributor_rate = $request->supDistributorRate;
        $settings->api_rate = $request->apiRate;
        $settings->helpline_email = $request->helplineEmail;
        $settings->helpline_phone = $request->helplineNumber;
        $settings->puc_type = $request->pucType;
        $settings->disable_user_id = $request->disableUser;

        if (!$settings->id) {
            $settings->created_at = date('Y-m-d H:i:s');
            $settings->updated_at = date('Y-m-d H:i:s');
        } else {
            $settings->updated_at = date('Y-m-d H:i:s');
        }

        // Save the changes
        $settings->save();

        return response()->json(['status' => 200, 'message' => "Settings Added Successfully!"]);
    }

    public function storeApiSettings(Request $request)
    {
        $validatedData = $request->validate([
            'merchatId' => 'required|max:255',
            'merchantKey' => 'required|max:255',
            'convinceFee' => 'required|min:0|max:100'
        ]);

        // Process form submission if validation passes
        $ApiSettings = ApiSettings::first();

        if (!isset($ApiSettings->id)) {
            $ApiSettings = new ApiSettings();
        }
        // Update the settings with the new values
        $ApiSettings->merchant_id = $request->merchatId;
        $ApiSettings->merchant_key = $request->merchantKey;
        $ApiSettings->fee_percent = $request->convinceFee;
        $ApiSettings->status = $request->apiStatus;

        if (!$ApiSettings->id) {
            $ApiSettings->created_at = date('Y-m-d H:i:s');
            $ApiSettings->updated_at = date('Y-m-d H:i:s');
        } else {
            $ApiSettings->updated_at = date('Y-m-d H:i:s');
        }
        $ApiSettings->save();

        return response()->json(['status' => 200, 'message' => "API Settings Added Successfully!"]);
        // return redirect()->back()->with('success', 'API Settings Added Successfully...');
    }

    public function storeNotifSettings(Request $request)
    {
        $validatedData = $request->validate([
            'notification_title' => 'required|max:100',
            'notification_url' => 'sometimes|nullable|url',
            'notification_text' => 'required'
        ]);

        // Process form submission if validation passes

        if ($request->notification_id == null) {
            $Notifications = new Notifications();
        } else {
            $Notifications = Notifications::find($request->notification_id);
        }

        // Update the settings with the new values
        $Notifications->title = $request->notification_title;
        $Notifications->url = $request->notification_url;
        $Notifications->message = $request->notification_text;

        if (!$Notifications->id) {
            $Notifications->date = date('Y-m-d H:i:s');
            $Notifications->created_at = date('Y-m-d H:i:s');
            $Notifications->updated_at = date('Y-m-d H:i:s');
        } else {
            $Notifications->updated_at = date('Y-m-d H:i:s');
        }
        $Notifications->save();

        $data['notifications'] = Notifications::orderBy('created_at', 'desc')->get();
        if ($request->notification_id == null) {
            return response()->json(['status' => 200, 'message' => "Notification Added Successfully!", 'data' => $data]);
        } else {
            return response()->json(['status' => 200, 'message' => "Notification Updated Successfully!", 'data' => $data]);
        }
    }

    public function deleteSpecificNotification(Request $request)
    {
        $notif_id = $request->id;
        $notification = Notifications::where('id', $notif_id)->delete();
        $data['notifications'] = Notifications::orderBy('created_at', 'desc')->get();
        return response()->json(['status' => 200, 'message' => "Notification Deleted Successfully!", 'data' => $data]);
    }

    public function editSpecificNotification(Request $request)
    {

        $notif_id = $request->id;
        $data['notification'] = Notifications::where('id', $notif_id)->first();
        return response()->json(['status' => 200, 'message' => "", 'data' => $data]);
    }


    public function storeTutorialSettings(Request $request)
    {
        $req_file = 'uploadThumbnail';
        $path = '/assets/uploads/tutorials/thumbnail';

        if ($request->tutorial_id == null) {
            $validatedData = $request->validate([
                'tutorial_title' => 'required|max:100',
                'tutorial_url' => 'required|url',
                'uploadThumbnail' => 'required|image|mimes:jpeg,png,jpg,gif,JPEG,PNG,JPG,GIF|max:2048'
            ]);
        } else {
            $validatedData = $request->validate([
                'tutorial_title' => 'required|max:100',
                'tutorial_url' => 'required|url',
                'uploadThumbnail' => 'image|mimes:jpeg,png,jpg,gif,JPEG,PNG,JPG,GIF|max:2048'
            ]);
        }

        // Process form submission if validation passes
        if ($request->tutorial_id == null) {
            $Tutorials = new Tutorials();
        } else {
            $Tutorials = Tutorials::find($request->tutorial_id);
        }

        // Update the settings with the new values
        $Tutorials->title = $request->tutorial_title;
        $Tutorials->url = $request->tutorial_url;
        $Tutorials->status = isset($request->tutorial_status) ? $request->tutorial_status : '';

        if (!$Tutorials->id) {
            $Tutorials->date = date('Y-m-d H:i:s');
            $Tutorials->created_at = date('Y-m-d H:i:s');
            $Tutorials->updated_at = date('Y-m-d H:i:s');
        } else {
            $Tutorials->updated_at = date('Y-m-d H:i:s');
        }

        $previous_image = Tutorials::where('id', $request->tutorial_id)->value('thumbnail');

        if ($request->hasFile($req_file)) {
            if ($request->tutorial_id != null) {
                deleteImage(str_replace(url('/'), '', $previous_image));
            }
            $uploadedFile = $request->file($req_file);

            $savedImage = saveSingleImage($uploadedFile, $path);
            $Tutorials->thumbnail = url('/') . $savedImage;
        } else {  // if file is not update on edit case then assign previous file
            $Tutorials->thumbnail = $previous_image;
        }

        $Tutorials->save();

        $data['tutorials'] = Tutorials::orderBy('created_at', 'desc')->get();
        if ($request->tutorial_id == null) {
            return response()->json(['status' => 200, 'message' => "Tutorial Added Successfully!", 'data' => $data]);
        } else {
            return response()->json(['status' => 200, 'message' => "Tutorial Updated Successfully!", 'data' => $data]);
        }
    }

    public function deleteSpecificTutorial(Request $request)
    {

        $notif_id = $request->id;
        $notification = Tutorials::where('id', $notif_id)->delete();
        $data['tutorial'] = Tutorials::orderBy('created_at', 'desc')->get();
        return response()->json(['status' => 200, 'message' => "Tutorial Deleted Successfully!", 'data' => $data]);
    }

    public function editSpecificTutorial(Request $request)
    {

        $tutorial_id = $request->id;
        $data['tutorial'] = Tutorials::where('id', $tutorial_id)->first();
        return response()->json(['status' => 200, 'message' => "", 'data' => $data]);
    }


    public function getUsersPageData(Request $request)
    {
        $data['pending_users'] = User::whereIn('status', ['inactive'])->where('type', 'user')->with(['state', 'city', 'area'])->orderBy('created_at', 'desc')->get();
        $data['active_users'] = User::whereIn('status', ['active', 'approved','blocked'])->where('type', 'user')->with(['state', 'city', 'area'])->orderBy('created_at', 'desc')->get();

        return response()->json(['status' => 200, 'data' => $data]);
    }


    public function updateUserBalance(Request $request)
    {
        $flag = $request->flag;
        $amount = $request->amount;
        $user = User::where('id', $request->user_id)->first();

        if ($user) {

            if ($flag == 'credit') {
                $new_amount = $user->balance + $amount;
                $trnx_flag = 1;
                $trnx_remarks = 'Added by admin';
            } else if ($flag == 'debit') {
                $new_amount = $user->balance - $amount;
                $trnx_flag = 2;
                $trnx_remarks = 'Removed by admin';
            } else {
                return response()->json(['status' => 402, 'message' => 'Something went wrong!']);
            }

            User::where('id', $user->id)->update([
                'balance' => $new_amount,
            ]);

            $transaction = new Transactions;
            $transaction->type = $trnx_flag; // 1=>credit, 2=>debit
            $transaction->transaction_type = '2'; // 1=>online, 2=>manual transaction
            $transaction->user_id = $user->id;
            $transaction->bank_id = null;
            $transaction->amount = $amount;
            $transaction->transaction_number = null;
            $transaction->transaction_remarks = $trnx_remarks;
            $transaction->status = '3';
            $transaction->date = date('Y-m-d');
            $transaction->save();

            $newTransactionId = $transaction->id;
            $transaction_updated = Transactions::where('id', $newTransactionId)->with(['createdByUser', 'bankName'])->first();
            $userData = $transaction_updated->createdByUser;

            $mailData['bankData'] = $transaction_updated->bankName;

            $mailData['userName'] = $userData->name;
            $date = new \DateTime($transaction_updated->date);
            $transaction_updated->date = $date->format('d-m-Y');
            $mailData['transaction'] = $transaction_updated;
            // dd($mailData['transaction']->status);
            $body = view('emails.admin_credit_debit', $mailData);
            $userEmailsSend[] = $userData->email;
            // to username, to email, from username, subject, body html
            if ($transaction_updated->type == 1) {
                sendMail($userData->name, $userEmailsSend, 'PUCZONE', 'Balance Added', $body); // send_to_name, send_to_email, email_from_name, subject, body
            }
            if ($transaction_updated->type == 2) {
                sendMail($userData->name, $userEmailsSend, 'PUCZONE', 'Balance Deducted', $body); // send_to_name, send_to_email, email_from_name, subject, body
            }

            $data['active_users'] = User::whereIn('status', ['active', 'approved'])->where('type', 'user')->with(['state', 'city', 'area'])->orderBy('created_at', 'desc')->get();

            return response()->json(['status' => 200, 'message' => 'Balance updated successfully!', 'data' => $data]);
        } else {
            return response()->json(['status' => 402, 'message' => 'Something went wrong!']);
        }



        return response()->json(['status' => 200, 'data' => $data]);
    }












    public function registerUser(Request $request)
    {
        if ($request->user_id == null) { // create user validation
            $validatedData = $request->validate([
                'user_name' => 'required|max:100',
                'username_auto' => 'required|max:100',
                'company_name' => 'required|max:100',
                'user_phone' => 'required|numeric',
                'user_email' => 'required|email|unique:users,email',
                'user_pin' => 'required|max:100',
                'user_state' => 'required',
                'user_city' => 'required',
                'user_area' => 'required',
                'upload_picture' => 'required|image|mimes:jpeg,png,jpg,gif,JPEG,PNG,JPG,GIF|max:400',
                'upload_aadhar' => 'required|image|mimes:jpeg,png,jpg,JPEG,PNG,JPG|max:400',
                'user_type' => 'required',
                // 'challan_amount' => 'required|max:10',
                'puc_type_rate' => ['nullable', 'array', function ($attribute, $value, $fail) {
                    // Check if at least one value exists in the array
                    if (!collect($value)->filter()->count()) {
                        $fail('At least one PUC Type Rate must have a value.');
                    }
                }],
            ]);

            $Users = new User();
        } else { // update user validation

            $validatedData = $request->validate([
                'user_name' => 'required|max:100',
                'username_auto' => 'required|max:100',
                'company_name' => 'required|max:100',
                'user_phone' => 'required|numeric',
                'user_email' => 'required|email',
                'user_pin' => 'required|max:100',
                'user_state' => 'required',
                'user_city' => 'required',
                'user_area' => 'required',
                'upload_picture' => 'image|mimes:jpeg,png,jpg,gif,JPEG,PNG,JPG,GIF|max:2048',
                'upload_aadhar' => 'image|mimes:jpeg,png,jpg,JPEG,PNG,JPG|max:400',
                'user_type' => 'required',
                // 'challan_amount' => 'required|max:10',
                'puc_type_rate' => ['nullable', 'array', function ($attribute, $value, $fail) {
                    // Check if at least one value exists in the array
                    if (!collect($value)->filter()->count()) {
                        $fail('At least one PUC Type Rate must have a value.');
                    }
                }],
            ]);

            // Process form submission if validation passes
            $existing = User::where('user_type', $request->username_auto)->first();

            if (isset($existing->id)) {
                return response()->json(['status' => 401, 'message' => "Username is already exist, try another time!"]);
            }
            $Users = User::find($request->user_id);
        }


        //Handle register Payment



        // Update the settings with the new values
        $Users->type = 'user';
        $Users->name = $request->user_name;
        $Users->username = $request->username_auto;
        $Users->email = $request->user_email;
        $Users->phone_number = $request->user_phone;
        $Users->user_type = isset($request->user_type) ? $request->user_type : 'retailer';
        $Users->company_name = $request->company_name;
        $Users->pin_code = $request->user_pin;
        $Users->state_id = $request->user_state;
        $Users->city_id = $request->user_city;
        $Users->area_id = $request->user_area;
        $Users->landmark = $request->user_landmark;
        $Users->challan_rate = $request->challan_amount;
        $Users->upload_option = $request->upload_option;

        $req_file = 'upload_picture';
        $path = '/assets/uploads/profile';
        $previous_image = User::where('id', $request->user_id)->value('profile_picture');

        if ($request->hasFile($req_file)) {
            if ($request->user_id != null) {
                deleteImage($previous_image);
            }
            $uploadedFile = $request->file($req_file);

            $savedImage = saveSingleImage($uploadedFile, $path);
            $Users->profile_picture = url('/') . $savedImage;
        } else {  // if file is not update on edit case then assign previous file
            $Users->profile_picture = $previous_image;
        }

        $req_file1 = 'upload_aadhar';
        $path1 = '/assets/uploads/aadhar';
        $previous_image1 = User::where('id', $request->user_id)->value('aadhar');

        if ($request->hasFile($req_file1)) {
            if ($request->user_id != null) {
                deleteImage($previous_image1);
            }
            $uploadedFile = $request->file($req_file1);

            $savedFile = saveSingleImage($uploadedFile, $path1);
            $Users->aadhar = url('/') . $savedFile;
        } else {  // if file is not update on edit case then assign previous file
            $Users->aadhar = $previous_image1;
        }

        $Users->status = 'active';
        if ($request->user_id == null) {
            $Users->created_at = date('Y-m-d H:i:s');
            $Users->updated_at = date('Y-m-d H:i:s');
        } else {
            $Users->updated_at = date('Y-m-d H:i:s');
        }

        // Save the changes
        $Users->save();




















        // save PUC Type Rates against user
        $pucTypeIds = $request->input('puc_type_ids');
        $pucTypeRates = $request->input('puc_type_rate');

        if (count($pucTypeRates) > 0) {
            PucUserRates::where('user_id', $Users->id)->delete(); //  delete previous entries and save new
            foreach ($pucTypeRates as $key => $pucTypeRate) {

                if ($pucTypeRate != null) {

                    $PucUserRates = new PucUserRates();
                    $PucUserRates->user_id = $Users->id;
                    $PucUserRates->puc_type_id = $pucTypeIds[$key];
                    $PucUserRates->puc_rate = $pucTypeRate;
                    $PucUserRates->date = date('Y-m-d H:i:s');
                    $PucUserRates->save();
                }
            }
        }

        do {
            $username_auto = 'PUCZ' . mt_rand(100000, 999999);
            $existing_number = User::where('username', $username_auto)->first();
        } while ($existing_number);

        $data['username_auto'] = $username_auto;

        if ($request->user_id == null) {
            return response()->json(['status' => 200, 'message' => "User Created Successfully!", 'data' => $data]);
        } else {
            return response()->json(['status' => 200, 'message' => "User Updated Successfully!", 'data' => $data]);
        }
    }

    public function editUser(Request $request)
    {

        $user_id = $request->id;
        $user_detail = User::where('id', $user_id)->with(['state', 'city', 'area', 'pucRates'])->first();
        $data['user_detail'] = $user_detail;
        $data['cities'] = Cities::where('state_id', $user_detail->state_id)->orderBy('created_at', 'desc')->get();
        $data['areas'] = Areas::where('city_id', $user_detail->city_id)->orderBy('created_at', 'desc')->get();
        // dd($data);
        return response()->json(['status' => 200, 'message' => "", 'data' => $data]);
    }

    public function blockUser(Request $request)
    {

        $user_id = $request->id;

        $user = User::where('id', $user_id)->first();
        if($user->status == 'blocked'){
            $user->status = 'active';
            $user->save();
            return response()->json(['status' => 200, 'message' => "Unblock User Successfully"]);
        }
        if($user->status == 'active'){
            $user->status = 'blocked';
            $user->save();
            return response()->json(['status' => 200, 'message' => "Block User Successfully"]);
        }
        if($user->status == 'inactive'){
            $user->status = 'blocked';
            $user->save();
            return response()->json(['status' => 200, 'message' => "Block User Successfully"]);
        }

        // dd($request->all());
       
    }

    public function getUserFilteredData(Request $request)
    {

        $filterFlag = $request->filterFlag;
        $param1 = $request->param1;
        $param2 = $request->param2;

        if ($filterFlag == '1' || $filterFlag == '2') {
            $Users = User::whereIn('status', ['active', 'approved','blocked'])
                ->where('type', 'user')
                ->whereDate('created_at', '=', $param1)         // for today  & yesterday
                ->with(['state', 'city', 'area'])
                ->orderBy('created_at', 'desc')->get();
        } else if ($filterFlag == '3') {

            $Users = User::whereIn('status', ['active', 'approved','blocked'])
                ->where('type', 'user')
                ->whereYear('created_at', date('Y'))
                ->whereMonth('created_at', $param1)             // for month
                ->with(['state', 'city', 'area'])
                ->orderBy('created_at', 'desc')->get();
        } else if ($filterFlag == '4') {

            $Users = User::whereIn('status', ['active', 'approved','blocked'])
                ->where('type', 'user')
                ->whereDate('created_at', '>=', $param1)    // for start date
                ->whereDate('created_at', '<=', $param2)    // for end date
                ->with(['state', 'city', 'area'])
                ->orderBy('created_at', 'desc')->get();
        }

        $data['active_users'] = $Users;
        // dd($data);
        return response()->json(['status' => 200, 'message' => "", 'data' => $data]);
    }

    public function getPucPageData(Request $request)
    {
        $puc_type_id = $request->puc_type_id;

        $data['pending_puc_list'] = Puc::where('status', '1')->with(['pucType', 'user'])->orderBy('created_at', 'desc')->get();
        $data['all_puc_list'] = Puc::with(['pucType', 'user'])->orderBy('created_at', 'desc')->get();

        return response()->json(['status' => 200, 'message' => "", 'data' => $data]);
    }

    public function changePucStatus(Request $request)
    {
        $puc_id = $request->pucId;
        $status_flag = $request->statusFlag;
        $rejection_reason = $request->param1;

        $pucDetail = Puc::where('id', $puc_id)->with(['user', 'pucType'])->first();
        $userDetail = $pucDetail->user;

        // dd($userDetail);
        if ($status_flag == '4') {
            if(!isset($pucDetail->certificate_pdf) || $pucDetail->certificate_pdf == null ){
                return response()->json(['status' => 402, 'message' => "Please Upload pdf file first!"]);
            }
            else{
            Puc::where('id', $puc_id)->update([
                'status' => '4', // completed status
            ]);
            $emailTitle = 'PUC Completed';
        }
        } else if ($status_flag == '3') {

            Puc::where('id', $puc_id)->update([
                'status' => '3', // rejected status
                'rejection_reason' => $rejection_reason, // rejected status
            ]);

            $rejected_puc = Puc::where('id', $puc_id)->first();
            $rejected_puc->vehicle_image = Null;
            $rejected_puc->certificate_pdf = Null;
            $rejected_puc->file_view_flag = Null;
            $rejected_puc->start_date = Null;
            $rejected_puc->end_date = Null;
            $rejected_puc->save();

            if ($userDetail != null) {
                $balance = $userDetail->balance;
                $newBalance = $balance + $pucDetail->puc_charges;
                $emailTitle = 'PUC Rejected';

                User::where('id', $userDetail->id)->update([
                    'balance' => $newBalance
                ]);

                $transaction = new Transactions;
                $transaction->type = '1'; // 1=>credit, 2=>debit
                $transaction->transaction_type = '2'; // manual transaction
                $transaction->user_id = $userDetail->id;
                $transaction->bank_id = null;
                $transaction->puc_id = $puc_id;
                $transaction->amount = $pucDetail->puc_charges;
                $transaction->transaction_number = null;
                $transaction->transaction_remarks = 'Added by admin';
                $transaction->status = '3';
                $transaction->date = date('Y-m-d');
                $transaction->save();
            }
        }

        $pucDetail = Puc::where('id', $puc_id)->with(['user', 'pucType'])->first();
        $pucDetail->pucTypeName = $pucDetail->pucType->name;

        // send email code
        $body = view('emails.puc_order', $pucDetail);
        $userEmailsSend[] = $pucDetail->user->email;
        // to username, to email, from username, subject, body html
        sendMail($pucDetail->user->name, $userEmailsSend, 'PUCZONE', $emailTitle, $body); // send_to_name, send_to_email, email_from_name, subject, body

        return response()->json(['status' => 200, 'message' => "PUC Status Updated Successfully!"]);
    }

    public function getOrderHistoryFilteredData(Request $request)
    {

        $filterFlag = $request->filterFlag;
        $param1 = $request->param1;
        $param2 = $request->param2;

        if ($filterFlag == '1' || $filterFlag == '2') {
            $puc_list = Puc::whereDate('date', '=', $param1)         // for today  & yesterday
                ->with(['pucType', 'user'])
                ->orderBy('created_at', 'desc')->get();
        } else if ($filterFlag == '3') {

            $puc_list = Puc::whereYear('date', date('Y'))
                ->whereMonth('date', $param1)             // for month
                ->with(['pucType', 'user'])
                ->orderBy('created_at', 'desc')->get();
        } else if ($filterFlag == '4') {

            $puc_list = Puc::whereDate('date', '>=', $param1)    // for start date
                ->whereDate('date', '<=', $param2)    // for end date
                ->with(['pucType', 'user'])
                ->orderBy('created_at', 'desc')->get();
        }

        $data['all_puc_list'] = isset($puc_list) ? $puc_list : array();
        // dd($data);
        return response()->json(['status' => 200, 'message' => "", 'data' => $data]);
    }


    public function getUserInfoData(Request $request)
    {

        $user_id = $request->user_id;

        $data['user_info'] = User::where('id', $user_id)->with(['state', 'city', 'area'])->first();
        // dd($data);
        return response()->json(['status' => 200, 'message' => "", 'data' => $data]);
    }

    public function uploadPucPdfFile(Request $request)
    {
        $validatedData = $request->validate([
            'uploadFile' => 'required|mimes:pdf,PDF|max:400'
        ]);

        // extract start and end date from pdf file 
        $uploadedFile = $request->file('uploadFile');
        // Save the uploaded file to a temporary location
        $pdfFilePath = $uploadedFile->storeAs('temp', $uploadedFile->getClientOriginalName());

        // Extract text from the PDF file
        // if (config('app.env') == 'local') {
            // $binpath = 'C:/Program Files/Git/mingw64/bin/pdftotext';
            // $text = Pdf::getText($request->file('uploadFile'), $binpath);
        // } else { // on dev or prod
            // $binpath = storage_path('/pdftotext');
            // $text = Pdf::getText(storage_path('app/' . $pdfFilePath), $binpath);
        // }
        // Delete the temporary PDF file
        unlink(storage_path('app/' . $pdfFilePath));

        // $pattern = '/\b(\d{2})\/(\d{2})\/(\d{4})\b/'; // Regex pattern for DD/MM/YYYY format
        // preg_match_all($pattern, $text, $matches);

        // Extracted dates
        // $dates = $matches[0];

        // foreach ($dates as $key => $date) {
            // $dateString = Carbon::createFromFormat('d/m/Y', $date);
            // Extract the time portion
            // $dateFormated = $dateString->format('Y-m-d');
            // if ($key == 0) {
                // $startDate = $dateFormated;
            // } elseif ($key == 1) {
                // $endDate = $dateFormated;
            // }
        // }

        // if ((isset($startDate) && $startDate != '') && isset($endDate) && $endDate != '') {

            $req_file = 'uploadFile';
            $path = '/assets/uploads/puc/pdf_files';
            $previous_file = Puc::where('id', $request->puc_id)->value('certificate_pdf');

            // dd($previous_file);
            if ($request->hasFile($req_file)) {
                if ($previous_file) {
                    deleteImage($previous_file);
                }

                $uploadedFile = $request->file($req_file);

                $savedFile = saveSingleImage($uploadedFile, $path);
                $full_path = url('/') . $savedFile;
            } else {  // if file is not update on edit case then assign previous file
                $full_path = $previous_file;
            }

            Puc::where('id', $request->puc_id)->update([
                'start_date' => null,
                'end_date' => null,
                'certificate_pdf' => $full_path,
                // 'status' => '4',
                'updated_at' => date('Y-m-d H:i:s'),
            ]);

            return response()->json(['status' => 200, 'message' => "File uploaded successfully!"]);
        // } else {
        //     return response()->json(['status' => 402, 'message' => "PDF file not have proper dates try another file"]);
        // }
    }

    public function uploadExcelFrom(Request $request)
    {
        
        $validatedData = $request->validate([
            'uploadFile.*' => 'required|mimes:pdf,PDF|max:400',
            'uploadFile' => 'max:10|min:1',
        ], [
            'uploadFile.max' => 'You can upload a maximum of :max files at a time.',
            'uploadFile.min' => 'You can upload atleast :max file for bulk upload.',
        ]);

        $tempArray = [];
        $dataArray = [];

        // Process uploaded files
        if ($request->hasFile('uploadFile')) {
            foreach ($request->file('uploadFile') as $key => $file) {

                // Get the original file name
                $filename = $file->getClientOriginalName();
                $filenameWithoutExtension = pathinfo($filename, PATHINFO_FILENAME);
                $tempArray['name'] = $filename;

                // extract start and end date from pdf file 
                $uploadedFile = $file;
                // Save the uploaded file to a temporary location
                $pdfFilePath = $uploadedFile->storeAs('temp', $uploadedFile->getClientOriginalName());

                // Extract text from the PDF file
                // $binpath = 'C:/Program Files/Git/mingw64/bin/pdftotext';
                // if (config('app.env') == 'local') {
                    // $text = Pdf::getText($file, $binpath);
                // } else { // on dev or prod
                    // $text = Pdf::getText(storage_path('app/' . $pdfFilePath));
                // }
                // Delete the temporary PDF file
                unlink(storage_path('app/' . $pdfFilePath));

                // $pattern = '/\b(\d{2})\/(\d{2})\/(\d{4})\b/'; // Regex pattern for DD/MM/YYYY format
                // preg_match_all($pattern, $text, $matches);

                // Extracted dates
                // $dates = $matches[0];

                // foreach ($dates as $key => $date) {
                    // $dateString = Carbon::createFromFormat('d/m/Y', $date);
                    // Extract the time portion
                    // $dateFormated = $dateString->format('Y-m-d');
                    // if ($key == 0) {
                        // $startDate = $dateFormated;
                    // } elseif ($key == 1) {
                        // $endDate = $dateFormated;
                    // }
                // }

                // if ((isset($startDate) && $startDate != '') && isset($endDate) && $endDate != '') {


                    $existPuc = Puc::where('registration_number', $filenameWithoutExtension)->first();

                    if (isset($existPuc->id)) {
                        $req_file = 'uploadFile';
                        $path = '/assets/uploads/puc/pdf_files';
                        $previous_file = Puc::where('id', $existPuc->id)->value('certificate_pdf');

                        if ($previous_file) {
                            deleteImage(str_replace(url('/'), '', $previous_file));
                        }

                        // dd($previous_file);
                        $uploadedFile = $file;

                        $savedFile = saveSingleImage($uploadedFile, $path);
                        $full_path = url('/') . $savedFile;

                        Puc::where('id', $existPuc->id)->update([
                            'status' => '4',
                            'start_date' => null,
                            'end_date' => null,
                            'certificate_pdf' => $full_path,
                            'updated_at' => date('Y-m-d H:i:s'),
                        ]);

                        $tempArray['error'] = '200';
                        $tempArray['msg'] = 'Success';
                    } else {
                        $tempArray['error'] = '402';
                        $tempArray['msg'] = 'Not Found';
                    }
                // } else {
                //     $tempArray['error'] = '402';
                //     $tempArray['msg'] = "PDF file not have proper dates try another file";
                // }
                $dataArray[] = $tempArray;
                $tempArray = [];
            }

            return response()->json(['status' => 200, 'message' => "Upload Completed!", 'data' => $dataArray]);
        } else {
            return response()->json(['status' => 402, 'message' => "No File Received!", 'data' => $dataArray]);
        }
    }


    public function getAnalyticsPageData(Request $request)
    {

        $filter_flag = $request->filterFlag;
        $param1 = $request->param1;
        $param2 = $request->param2;

        $puc_2w = $puc_2w_fine = $puc_3w = $puc_3w_fine = $puc_4w = $puc_4w_fine = 0;
        $puc_2w_am = $puc_2w_fine_am = $puc_3w_am = $puc_3w_fine_am = $puc_4w_am = $puc_4w_fine_am = 0;
        $puc_challan_qty = $puc_challan_am = 0;

        if ($filter_flag == '0') {
            $data['pending_users'] = User::where('type', 'user')->where('status', 'inactive')->count();
            $data['active_users'] = User::where('type', 'user')->whereIn('status', ['active', 'approved'])->count();

            $puc_list = Puc::get();
        } else if ($filter_flag == '1') {  // for today and yesterday filter
            $data['pending_users'] = User::where('type', 'user')
                ->where('status', 'inactive')
                ->whereDate('created_at', '=', $param1)
                ->count();

            $data['active_users'] = User::where('type', 'user')
                ->whereDate('created_at', '=', $param1)
                ->whereIn('status', ['active', 'approved'])
                ->count();
            $puc_list = Puc::whereDate('date', '=', $param1)->get();
        } else if ($filter_flag == '2') {          // for month filter

            $data['pending_users'] = User::where('type', 'user')
                ->where('status', 'inactive')
                ->whereYear('created_at', date('Y'))
                ->whereMonth('created_at', '=', $param1)
                ->count();

            $data['active_users'] = User::where('type', 'user')
                ->whereIn('status', ['active', 'approved'])
                ->whereYear('created_at', date('Y'))
                ->whereMonth('created_at', '=', $param1)

                ->count();
            $puc_list = Puc::whereYear('date', date('Y'))->whereMonth('date', '=', $param1)->get();
        } else if ($filter_flag == '3') {          // for date range filter

            $data['pending_users'] = User::where('type', 'user')
                ->where('status', 'inactive')
                ->whereDate('created_at', '>=', $param1)    // for start date
                ->whereDate('created_at', '<=', $param2)    // for end date
                ->count();

            $data['active_users'] = User::where('type', 'user')
                ->whereIn('status', ['active', 'approved'])
                ->whereDate('created_at', '>=', $param1)    // for start date
                ->whereDate('created_at', '<=', $param2)    // for end date
                ->count();
            $puc_list = Puc::whereDate('date', '>=', $param1)->whereDate('date', '<=', $param2)->get();
        }

        // dd($puc_list);

        if ($puc_list) {
            foreach ($puc_list as $key => $value) {
                if ($value->puc_type_id == 1) {
                    $puc_2w = $puc_2w + 1;
                    $puc_2w_am = $puc_2w_am + $value->puc_charges;
                }
                if ($value->puc_type_id == 2) {
                    $puc_2w_fine = $puc_2w_fine + 1;
                    $puc_2w_fine_am = $puc_2w_fine_am + $value->puc_charges;
                }
                if ($value->puc_type_id == 3) {
                    $puc_3w = $puc_3w + 1;
                    $puc_3w_am = $puc_3w_am + $value->puc_charges;
                }
                if ($value->puc_type_id == 4) {
                    $puc_3w_fine = $puc_3w_fine + 1;
                    $puc_3w_fine_am = $puc_3w_fine_am + $value->puc_charges;
                }
                if ($value->puc_type_id == 5) {
                    $puc_4w = $puc_4w + 1;
                    $puc_4w_am = $puc_4w_am + $value->puc_charges;
                }
                if ($value->puc_type_id == 6) {
                    $puc_4w_fine = $puc_4w_fine + 1;
                    $puc_4w_fine_am = $puc_4w_fine_am + $value->puc_charges;
                }

                if ($value->challan != null) {
                    $puc_challan_qty = $puc_challan_qty + 1;
                    $puc_challan_am = $puc_challan_am + $value->puc_challan_rate;
                }
            }
        }

        $data['puc_2w'] = $puc_2w;
        $data['puc_2w_fine'] = $puc_2w_fine;
        $data['puc_3w'] = $puc_3w;
        $data['puc_3w_fine'] = $puc_3w_fine;
        $data['puc_4w'] = $puc_4w;
        $data['puc_4w_fine'] = $puc_4w_fine;

        $data['puc_2w_am'] = $puc_2w_am;
        $data['puc_2w_fine_am'] = $puc_2w_fine_am;
        $data['puc_3w_am'] = $puc_3w_am;
        $data['puc_3w_fine_am'] = $puc_3w_fine_am;
        $data['puc_4w_am'] = $puc_4w_am;
        $data['puc_4w_fine_am'] = $puc_4w_fine_am;

        $data['puc_challan_qty'] = $puc_challan_qty;
        $data['puc_challan_am'] = $puc_challan_am;
        // dd($data);
        return response()->json(['status' => 200, 'message' => "", "data" => $data]);
    }

    public function updatePucViewFlags(Request $request)
    {

        $puc_id = $request->puc_id;
        $flag_type = $request->flag_type;

        if ($flag_type == '1') {
            Puc::where('id', $puc_id)->update([
                'file_view_flag' => '1',
            ]);
        } else if ($flag_type == '3') {
            Puc::where('id', $puc_id)->update([
                'share_view_flag' => '1',
            ]);
        } else if ($flag_type == '4') {
            Puc::where('id', $puc_id)->update([
                'download_view_flag' => '1',
            ]);
        }

        return response()->json(['status' => 200, 'message' => ""]);
    }




    //     public function processExcel(Request $request)
    //     {
    //         // Validate the request
    //         $request->validate([
    //             'excel_file' => 'required|mimes:xlsx',
    //         ]);

    //         // Get the uploaded file from the request
    //         $excelFile = $request->file('excel_file');

    //         // Read the Excel file
    //         $data = Excel::toArray([], $excelFile);

    //         // Access the first sheet data (assuming the Excel file has only one sheet)
    //         $sheetData = $data[0];

    //         print_r("<pre>");
    //         print_r($sheetData);
    //         exit();

    //         // Loop through the data and process as needed
    //         foreach ($sheetData as $key => $row) {

    //             if($key > 0 && $row[0] != ''){
    //                 // $dateValue = $row[0];
    //                 // $unixTimestamp = ($dateValue - 25569) * 86400; // Convert Excel date number to Unix timestamp

    //                 // $date = Carbon::createFromTimestamp($unixTimestamp);

    //                 // $formattedDate = $date->format('Y-m-d');

    //                 // echo $formattedDate."<br>";

    //                 // print_r("<pre>");
    //                 // print_r($row);
    //                 // exit();

    //                 // $State = new States();

    //                 // $State->id = $row[0];
    //                 // $State->name = $row[1];
    //                 // $State->status = '1';
    //                 // $State->save();

    //                 // $Cities = new Cities();

    //                 // $Cities->id = $row[0];
    //                 // $Cities->name = $row[1];
    //                 // $Cities->state_id = $row[2];
    //                 // $Cities->status = '1';
    //                 // $Cities->save();

    //                 // $Areas = new Areas();
    //                 // $Areas->id = $row[0];
    //                 // $Areas->name = $row[1];
    //                 // $Areas->city_id = $row[2];
    //                 // $Areas->status = '1';
    //                 // $Areas->save();

    //             }
    //         }
    //         return true;
    //     }

       


}
