<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use App\Models\User;
use App\Models\Settings;
use App\Models\ApiSettings;
use App\Models\Notifications;
use App\Models\Tutorials;



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
        $data['page'] = 'Users';
        return view('admin/users')->with($data);
    }

    public function settings(Request $request)
    {   
        $data['page'] = 'Settings';
        $data['users'] = User::where('status', 'Active')->whereIn('type', ['user'])->get();
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
        $Notifications = Notifications::find($request->notification_id);
        
        if($request->notification_id == null){
            $Notifications = new Notifications();
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
                'uploadThumbnail' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048'
            ]);
        }else{
            $validatedData = $request->validate([
                'tutorial_title' => 'required|max:100',
                'tutorial_url' => 'required|url',
                'uploadThumbnail' => 'image|mimes:jpeg,png,jpg,gif|max:2048'
            ]);
        }
        
        // Process form submission if validation passes
        $Tutorials = Tutorials::find($request->tutorial_id);
        
        if($request->tutorial_id == null){
            $Tutorials = new Tutorials();
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
        $data['active_users'] = User::where('status', 'active')->where('type', 'user')->with(['state', 'city', 'area'])->get();

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

            $data['active_users'] = User::where('status', 'active')->where('type', 'user')->with(['state', 'city', 'area'])->get();
            
            return response()->json(['status' => 200,'message' => 'Balance updated successfully!', 'data' => $data]);
        
        }else{
            return response()->json(['status' => 402,'message' => 'Something went wrong!']);
        }

        

        return response()->json(['status' => 200,'data' => $data]);
    }
    
    
}
