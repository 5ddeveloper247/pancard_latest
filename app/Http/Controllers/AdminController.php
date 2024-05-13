<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Spatie\PdfToText\Pdf;
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



class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    
    public function index(Request $request)
    {   
        $data['page'] = 'Orders';
        return view('admin/orders')->with($data);
    }

    public function users(Request $request)
    {   
        $data['states'] = States::where('status', '1')->get();
        $data['puc_types'] = PucTypes::where('status', '1')->get();
        
        do {
            $username_auto = 'PUCZ'.mt_rand(100000, 999999);
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
        $data['notifications'] = Notifications::get();
        $data['tutorials'] = Tutorials::get();

        return response()->json(['status' => 200,'data' => $data]);
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
        
        if(!isset($settings->id)){
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
        
        if(!$settings->id){
            $settings->created_at = date('Y-m-d H:i:s');
            $settings->updated_at = date('Y-m-d H:i:s');
        }else{
            $settings->updated_at = date('Y-m-d H:i:s');
        }
        
        // Save the changes
        $settings->save();

        return response()->json(['status' => 200,'message' => "Settings Added Successfully!"]);
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
        
        if(!isset($ApiSettings->id)){
            $ApiSettings = new ApiSettings();
        }
        // Update the settings with the new values
        $ApiSettings->merchant_id = $request->merchatId;
        $ApiSettings->merchant_key = $request->merchantKey;
        $ApiSettings->fee_percent = $request->convinceFee;
        $ApiSettings->status = $request->apiStatus;
        
        if(!$ApiSettings->id){
            $ApiSettings->created_at = date('Y-m-d H:i:s');
            $ApiSettings->updated_at = date('Y-m-d H:i:s');
        }else{
            $ApiSettings->updated_at = date('Y-m-d H:i:s');
        }
        $ApiSettings->save();
        
        return response()->json(['status' => 200,'message' => "API Settings Added Successfully!"]);
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
        
        if($request->notification_id == null){
            $Notifications = new Notifications();
        }else{
            $Notifications = Notifications::find($request->notification_id);
        }

        // Update the settings with the new values
        $Notifications->title = $request->notification_title;
        $Notifications->url = $request->notification_url;
        $Notifications->message = $request->notification_text;
        
        if(!$Notifications->id){
            $Notifications->date = date('Y-m-d H:i:s');
            $Notifications->created_at = date('Y-m-d H:i:s');
            $Notifications->updated_at = date('Y-m-d H:i:s');
        }else{
            $Notifications->updated_at = date('Y-m-d H:i:s');
        }
        $Notifications->save();
        
        $data['notifications'] = Notifications::get();
        if($request->notification_id == null){
            return response()->json(['status' => 200,'message' => "Notification Added Successfully!", 'data' => $data]);
        }else{
            return response()->json(['status' => 200,'message' => "Notification Updated Successfully!", 'data' => $data]);
        }
    }

    public function deleteSpecificNotification(Request $request)
    {   
        
        $notif_id = $request->id;
        $notification = Notifications::where('id', $notif_id)->delete();
        $data['notifications'] = Notifications::get();
        return response()->json(['status' => 200,'message' => "Notification Deleted Successfully!", 'data' => $data]);
        
    }

    public function editSpecificNotification(Request $request)
    {   
        
        $notif_id = $request->id;
        $data['notification'] = Notifications::where('id', $notif_id)->first();
        return response()->json(['status' => 200,'message' => "", 'data' => $data]);
        
    }


    public function storeTutorialSettings(Request $request)
    {   
        
        $req_file = 'uploadThumbnail';
        $path = '/images/thumbnail';

        if($request->tutorial_id == null){
            $validatedData = $request->validate([
                'tutorial_title' => 'required|max:100',
                'tutorial_url' => 'required|url',
                'uploadThumbnail' => 'required|image|mimes:jpeg,png,jpg,gif,JPEG,PNG,JPG,GIF|max:2048'
            ]);
        }else{
            $validatedData = $request->validate([
                'tutorial_title' => 'required|max:100',
                'tutorial_url' => 'required|url',
                'uploadThumbnail' => 'image|mimes:jpeg,png,jpg,gif,JPEG,PNG,JPG,GIF|max:2048'
            ]);
        }
        
        // Process form submission if validation passes
        
        if($request->tutorial_id == null){
            $Tutorials = new Tutorials();
        }else{
            $Tutorials = Tutorials::find($request->tutorial_id);
        }

        // Update the settings with the new values
        $Tutorials->title = $request->tutorial_title;
        $Tutorials->url = $request->tutorial_url;
        $Tutorials->status = isset($request->tutorial_status) ? $request->tutorial_status : '';
        
        if(!$Tutorials->id){
            $Tutorials->date = date('Y-m-d H:i:s');
            $Tutorials->created_at = date('Y-m-d H:i:s');
            $Tutorials->updated_at = date('Y-m-d H:i:s');
        }else{
            $Tutorials->updated_at = date('Y-m-d H:i:s');
        }
        
        $previous_image = Tutorials::where('id', $request->tutorial_id)->value('thumbnail');

        if ($request->hasFile($req_file)) {
            if($request->tutorial_id != null){
                deleteImage($previous_image);
            }
            $uploadedFile = $request->file($req_file);

            $savedImage = saveSingleImage($uploadedFile, $path);
            $Tutorials->thumbnail = url('/').$savedImage;
        }else{  // if file is not update on edit case then assign previous file
            $Tutorials->thumbnail = $previous_image;
        }
        
        $Tutorials->save();
        
        $data['tutorials'] = Tutorials::get();
        if($request->tutorial_id == null){
            return response()->json(['status' => 200,'message' => "Tutorial Added Successfully!", 'data' => $data]);
        }else{
            return response()->json(['status' => 200,'message' => "Tutorial Updated Successfully!", 'data' => $data]);
        }
    }

    public function deleteSpecificTutorial(Request $request)
    {   
        
        $notif_id = $request->id;
        $notification = Tutorials::where('id', $notif_id)->delete();
        $data['tutorial'] = Tutorials::get();
        return response()->json(['status' => 200,'message' => "Tutorial Deleted Successfully!", 'data' => $data]);
        
    }

    public function editSpecificTutorial(Request $request)
    {   
        
        $tutorial_id = $request->id;
        $data['tutorial'] = Tutorials::where('id', $tutorial_id)->first();
        return response()->json(['status' => 200,'message' => "", 'data' => $data]);
        
    }
    

    public function getUsersPageData(Request $request)
    {
        $data['pending_users'] = User::where('status', 'inactive')->where('type', 'user')->with(['state', 'city', 'area'])->get();
        $data['active_users'] = User::whereIn('status', ['active', 'approved'])->where('type', 'user')->with(['state', 'city', 'area'])->get();

        return response()->json(['status' => 200,'data' => $data]);
    }

    
    public function updateUserBalance(Request $request)
    {
        $flag = $request->flag;
        $amount = $request->amount;
        $user = User::where('id', $request->user_id)->first();

        if($user){
            
            if($flag == 'credit'){
                $new_amount = $user->balance + $amount;
            }else if($flag == 'debit'){
                $new_amount = $user->balance - $amount;
            }else{
                return response()->json(['status' => 402,'message' => 'Something went wrong!']);
            }
            
            User::where('id', $user->id)->update([
                'balance' => $new_amount,
            ]);

            $data['active_users'] = User::whereIn('status', ['active','approved'])->where('type', 'user')->with(['state', 'city', 'area'])->get();
            
            return response()->json(['status' => 200,'message' => 'Balance updated successfully!', 'data' => $data]);
        
        }else{
            return response()->json(['status' => 402,'message' => 'Something went wrong!']);
        }

        

        return response()->json(['status' => 200,'data' => $data]);
    }
    
    
    public function registerUser(Request $request)
    {   
        if($request->user_id == null){ // create user validation
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
                'upload_picture' => 'required|image|mimes:jpeg,png,jpg,gif,JPEG,PNG,JPG,GIF|max:2048',
                'upload_aadhar' => 'required|max:4096',
                'user_type' => 'required',
                'puc_type_rate' => ['nullable', 'array', function ($attribute, $value, $fail) {
                    // Check if at least one value exists in the array
                    if (!collect($value)->filter()->count()) {
                        $fail('At least one PUC Type Rate must have a value.');
                    }
                }],
            ]);

            $Users = new User();
            
        }else{ // update user validation

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
                'upload_aadhar' => 'max:4096',
                'user_type' => 'required',
                'puc_type_rate' => ['nullable', 'array', function ($attribute, $value, $fail) {
                    // Check if at least one value exists in the array
                    if (!collect($value)->filter()->count()) {
                        $fail('At least one PUC Type Rate must have a value.');
                    }
                }],
            ]);

            // Process form submission if validation passes
            $existing = User::where('user_type', $request->username_auto)->first();
            
            if(isset($existing->id)){
                return response()->json(['status' => 401,'message' => "Username is already exist, try another time!"]);
            }
            $Users = User::find($request->user_id);
        }

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
        $Users->upload_option = $request->upload_option;
        
        $req_file = 'upload_picture';
        $path = '/assets/uploads/profile';
        $previous_image = User::where('id', $request->user_id)->value('profile_picture');

        if ($request->hasFile($req_file)) {
            if($request->user_id != null){
                deleteImage($previous_image);
            }
            $uploadedFile = $request->file($req_file);

            $savedImage = saveSingleImage($uploadedFile, $path);
            $Users->profile_picture = url('/').$savedImage;
        }else{  // if file is not update on edit case then assign previous file
            $Users->profile_picture = $previous_image;
        }
        
        $req_file1 = 'upload_aadhar';
        $path1 = '/assets/uploads/aadhar';
        $previous_image1 = User::where('id', $request->user_id)->value('aadhar');

        if ($request->hasFile($req_file1)) {
            if($request->user_id != null){
                deleteImage($previous_image1);
            }
            $uploadedFile = $request->file($req_file1);

            $savedFile = saveSingleImage($uploadedFile, $path1);
            $Users->aadhar = url('/').$savedFile;
        }else{  // if file is not update on edit case then assign previous file
            $Users->aadhar = $previous_image1;
        }

        $Users->status = 'approved';
        if($request->user_id == null){
            $Users->created_at = date('Y-m-d H:i:s');
            $Users->updated_at = date('Y-m-d H:i:s');
        }else{
            $Users->updated_at = date('Y-m-d H:i:s');
        }
        
        // Save the changes
        $Users->save();

        // save PUC Type Rates against user
        $pucTypeIds = $request->input('puc_type_ids');
        $pucTypeRates = $request->input('puc_type_rate');

        if(count($pucTypeRates) > 0){
            PucUserRates::where('user_id', $Users->id)->delete(); //  delete previous entries and save new
            foreach($pucTypeRates as $key => $pucTypeRate){

                if($pucTypeRate != null){
                    
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
            $username_auto = 'PUCZ'.mt_rand(100000, 999999);
            $existing_number = User::where('username', $username_auto)->first();
        } while ($existing_number);

        $data['username_auto'] = $username_auto;

        if($request->user_id == null){
            return response()->json(['status' => 200,'message' => "User Created Successfully!", 'data' => $data]);
        }else{
            return response()->json(['status' => 200,'message' => "User Updated Successfully!", 'data' => $data]);
        }
    }

    public function editUser(Request $request)
    {   
        
        $user_id = $request->id;
        $user_detail = User::where('id', $user_id)->with(['state', 'city', 'area', 'pucRates'])->first();
        $data['user_detail'] = $user_detail;
        $data['cities'] = Cities::where('state_id', $user_detail->state_id)->get();
        $data['areas'] = Areas::where('city_id', $user_detail->city_id)->get();
        // dd($data);
        return response()->json(['status' => 200,'message' => "", 'data' => $data]);
    }

    public function getUserFilteredData(Request $request)
    {   
        
        $filterFlag = $request->filterFlag;
        $param1 = $request->param1; 
        $param2 = $request->param2;

        if($filterFlag == '1' || $filterFlag == '2'){
            $Users = User::whereIn('status', ['active', 'approved'])
                        ->where('type', 'user')
                        ->whereDate('created_at', '=', $param1)         // for today  & yesterday
                        ->with(['state', 'city', 'area'])
                        ->get();
        
        }else if($filterFlag == '3'){
            
            $Users = User::whereIn('status', ['active', 'approved'])
                        ->where('type', 'user')
                        ->whereYear('created_at', date('Y'))
                        ->whereMonth('created_at', $param1)             // for month
                        ->with(['state', 'city', 'area'])
                        ->get();
        }else if($filterFlag == '4'){
            
            $Users = User::whereIn('status', ['active', 'approved'])
                            ->where('type', 'user')
                            ->whereDate('created_at', '>=', $param1)    // for start date
                            ->whereDate('created_at', '<=', $param2)    // for end date
                            ->with(['state', 'city', 'area'])
                            ->get();
        }
       
        $data['active_users'] = $Users;
        // dd($data);
        return response()->json(['status' => 200,'message' => "", 'data' => $data]);
    }

    public function getPucPageData(Request $request)
    {   
        $puc_type_id = $request->puc_type_id;

        $data['pending_puc_list'] = Puc::where('status', '1')->with(['pucType','user'])->get();
        $data['all_puc_list'] = Puc::with(['pucType','user'])->get();
       
        return response()->json(['status' => 200,'message' => "", 'data' => $data]);
    }

    public function changePucStatus(Request $request)
    {   
        $puc_id = $request->pucId;
        $status_flag = $request->statusFlag;
        $rejection_reason = $request->param1;
        if($status_flag == '4'){
            Puc::where('id', $puc_id)->update([
                'status' => '4', // completed status
            ]);
        }else if($status_flag == '3'){
            Puc::where('id', $puc_id)->update([
                'status' => '3', // completed status
                'rejection_reason' => $rejection_reason, // rejected status
            ]);
        }
        
        return response()->json(['status' => 200,'message' => ""]);
    }

    public function getOrderHistoryFilteredData(Request $request)
    {   
        
        $filterFlag = $request->filterFlag;
        $param1 = $request->param1; 
        $param2 = $request->param2;

        if($filterFlag == '1' || $filterFlag == '2'){
            $puc_list = Puc::whereDate('date', '=', $param1)         // for today  & yesterday
                            ->with(['pucType','user'])
                            ->get();
        
        }else if($filterFlag == '3'){
            
            $puc_list = Puc::whereYear('date', date('Y'))
                            ->whereMonth('date', $param1)             // for month
                            ->with(['pucType','user'])
                            ->get();
        }else if($filterFlag == '4'){
            
            $puc_list = Puc::whereDate('date', '>=', $param1)    // for start date
                            ->whereDate('date', '<=', $param2)    // for end date
                            ->with(['pucType','user'])
                            ->get();
        }
       
        $data['all_puc_list'] = isset($puc_list) ? $puc_list : array();
        // dd($data);
        return response()->json(['status' => 200,'message' => "", 'data' => $data]);
    }

    
    public function getUserInfoData(Request $request)
    {   
        
        $user_id = $request->user_id;
        
        $data['user_info'] = User::where('id', $user_id)->with(['state', 'city', 'area'])->first();
        // dd($data);
        return response()->json(['status' => 200,'message' => "", 'data' => $data]);
    }

    public function uploadPucPdfFile(Request $request)
    {   
        $validatedData = $request->validate([
            'uploadFile' => 'required|mimes:pdf,PDF|max:2048'
        ]);


        // extract start and end date from pdf file 

        $uploadedFile = $request->file('uploadFile');
        // Save the uploaded file to a temporary location
        $pdfFilePath = $uploadedFile->storeAs('temp', $uploadedFile->getClientOriginalName());

        // Extract text from the PDF file
        $binpath = 'C:/Program Files/Git/mingw64/bin/pdftotext';
        if (config('app.env')=='local') {
            $text = Pdf::getText($request->file('uploadFile'),$binpath);
        }else{ // on dev or prod
            $text = Pdf::getText(storage_path('app/' . $pdfFilePath));
        }
        // Delete the temporary PDF file
        unlink(storage_path('app/' . $pdfFilePath));

        $pattern = '/\b(\d{2})\/(\d{2})\/(\d{4})\b/'; // Regex pattern for DD/MM/YYYY format
        preg_match_all($pattern, $text, $matches);

        // Extracted dates
        $dates = $matches[0];
        
        foreach ($dates as $key => $date) {
            $dateString = Carbon::createFromFormat('d/m/Y', $date);
            // Extract the time portion
            $dateFormated = $dateString->format('Y-m-d');
            if($key == 0){
                $startDate = $dateFormated;
            }elseif($key == 1){
                $endDate = $dateFormated;
            }
        }

        if((isset($startDate) && $startDate != '') && isset($endDate) && $endDate != ''){
            
            $req_file = 'uploadFile';
            $path = '/assets/uploads/profile';
            $previous_image = User::where('id', $userId)->value('profile_picture');

            if ($request->hasFile($req_file)) {
                
                deleteImage($previous_image);
                
                $uploadedFile = $request->file($req_file);

                $savedImage = saveSingleImage($uploadedFile, $path);
                $Users->profile_picture = url('/').$savedImage;
            }else{  // if file is not update on edit case then assign previous file
                $Users->profile_picture = $previous_image;
            }
            
        }else{
            return response()->json(['status' => 402,'message' => "PDF file not have proper dates try another file"]);
        }
        // print("<pre>");
        // print_r($startDate);
        // print("<pre>");
        // print_r($endDate);
        // dd($text);
        // exit;
        
        // Puc::where('id', $request->puc_id)->update([
        //     'certificate_pdf' => $full_path, 
        //     'updated_at' => date('Y-m-d H:i:s'), 
        // ]);
        
        // return response()->json(['status' => 200,'message' => "", 'data' => $data]);
    }
    
}
