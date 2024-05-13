<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Mail;
use App\Models\Settings;
use App\Models\User;
use App\Models\States;
use App\Models\Cities;
use App\Models\Areas;
use App\Models\Tutorials;
use App\Models\Notifications;
use App\Models\PucUserRates;
use App\Models\Puc;



class FrontEndController extends Controller
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
        return view('user/login');
    }

    public function login(Request $request)
    {   
        // $user = new User();
        // $user->type = 'user';
        // $user->name = 'Hamza';
        // $user->email = 'hamza@5dsolutions.ae';
        // $user->username = 'hamza';
        // $user->password = bcrypt('hamza123');
        // $user->status = 'active';
        // $user->save();
        $request->session()->forget('user');
        return view('user/login');
    }

    public function loginSubmit(Request $request)
    {
        $validatedData = $request->validate([
            'username' => 'required|exists:users,username',
        ]);

        $user = User::where('username', $request->username)->first();

        if($user){

            if($user->password==null){
                
                $request->session()->flash('error', 'Set user password first then login!');
                return redirect('login');
            
            }else{
                
                $credentials = $request->only('username', 'password');
    
                if (Auth::attempt($credentials)) {
                    
                    if ($user->status != 'inactive') {
                        // User is active, proceed with login
                        $user = Auth::user(); 
                        $request->session()->put('user', $user);
                        // Authentication passed...
                        return redirect()->intended('/home');
                    } else {
                        // User is not active, log them out and show an error message
                        $request->session()->flash('error', 'Your account is inactive. Please contact the administrator.');
                        return redirect('login');
                    }
                   
                }
    
                $request->session()->flash('error', 'The provided credentials do not match our records.');
                return redirect('login');
            }
        }else{
            $request->session()->flash('error', 'Something went wrong!');
            return redirect('login');
        }
    }
    public function logout(Request $request)
    {
        $request->session()->forget('user');
       
        return redirect('/login');
    }

    public function forget(Request $request)
    {
        return view('user/forgetpassword');
    }

    public function home(Request $request)
    {   
        $data['page'] = 'home';
        $data['notifications_limited'] = Notifications::limit(1)->get();
        $data['notifications_all'] = Notifications::get();
        $data['userPucTypes'] = PucUserRates::where('user_id', session('user')->id)->with(['pucType'])->get();
        // $data['user'] = User::where('id', session('user')->id)->with(['pucRates','pucRates.pucType'])->first();
        // dd($data['user']);
        return view('user/home')->with($data);
    }

    public function order(Request $request)
    {   
        $data['page'] = 'order';
        return view('user/order')->with($data);
    }

    public function wallet(Request $request)
    {   
        $data['page'] = 'wallet';
        return view('user/wallet')->with($data);
    }

    public function profile(Request $request)
    {   
        $data['page'] = 'profile';
        $data['user'] = User::where('id', session('user')->id)->first();
        $data['settings'] = Settings::first();
        $data['tutorials'] = Tutorials::where('status', 'on')->get();
        $data['notifications'] = Notifications::get();
        $data['states'] = States::where('status', '1')->get();
        
        return view('user/profile')->with($data);
    }

    public function getCitiesLovData(Request $request)
    {
        $data['cities'] = Cities::where('state_id', $request->state_id)->get();
        return response()->json(['status' => 200,'message' => "", 'data' => $data]);
    }

    public function getAreasLovData(Request $request)
    {
        $data['areas'] = Areas::where('city_id', $request->city_id)->get();
        return response()->json(['status' => 200,'message' => "", 'data' => $data]);
    }
    
    public function getUserProfileData(Request $request)
    {   
        
        $user_id = session('user')->id;
        $user_detail = User::where('id', $user_id)->with(['state', 'city', 'area', 'pucRates'])->first();
        $data['user_detail'] = $user_detail;
        $data['cities'] = Cities::where('state_id', $user_detail->state_id)->get();
        $data['areas'] = Areas::where('city_id', $user_detail->city_id)->get();
       
        return response()->json(['status' => 200,'message' => "", 'data' => $data]);
    }

    public function updateUserProfile(Request $request)
    {   
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
        ]);
        $userId = session('user')->id;
        $Users = User::find($userId);
        
        // Update the settings with the new values
        $Users->name = $request->user_name;
        $Users->username = $request->username_auto;
        $Users->email = $request->user_email;
        $Users->phone_number = $request->user_phone;
        $Users->company_name = $request->company_name;
        $Users->pin_code = $request->user_pin;
        $Users->state_id = $request->user_state;
        $Users->city_id = $request->user_city;
        $Users->area_id = $request->user_area;
        $Users->landmark = $request->user_landmark;
        
        $req_file = 'upload_picture';
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
        
        $req_file1 = 'upload_aadhar';
        $path1 = '/assets/uploads/aadhar';
        $previous_image1 = User::where('id', $userId)->value('aadhar');

        if ($request->hasFile($req_file1)) {
            
            deleteImage($previous_image1);
            
            $uploadedFile = $request->file($req_file1);

            $savedFile = saveSingleImage($uploadedFile, $path1);
            $Users->aadhar = url('/').$savedFile;
        }else{  // if file is not update on edit case then assign previous file
            $Users->aadhar = $previous_image1;
        }
        $Users->updated_at = date('Y-m-d H:i:s');
        // Save the changes
        $Users->save();

        return response()->json(['status' => 200,'message' => "User Updated Successfully!"]);
    }
    
    public function resetPasswordProfile(Request $request)
    {
        $validatedData = $request->validate([
            'username' => 'required|exists:users,username',
            'password' => 'required',
            'new_password' => 'required',
            'confirm_password' => 'required',
        ]);

        $user = User::where('username', $request->username)->first();

        if($user){

            $credentials = $request->only('username', 'password');
    
            if (Auth::attempt($credentials)) {
                
                $valid = preg_match('/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[^a-zA-Z0-9]).{8,}$/', $request->new_password);

                if(!$valid){
                    return response()->json(['status' => 402,'message' => "The new password must be at least 8 characters long and contain at least one uppercase letter, one lowercase letter, one number, and one special character."]);
                }else{
                    
                    if($request->new_password == $request->confirm_password){
                        User::where('id', $user->id)->update([
                            'otp' => null,
                            'password' => bcrypt($request->new_password),
                        ]);
                        
                        return response()->json(['status' => 200,'message' => "Password reset successfully!"]);

                    }else{
                        return response()->json(['status' => 402,'message' => "New password and confirm new password not match!"]);
                    }
                    
    
                    
                }
                
            }

            return response()->json(['status' => 402,'message' => "User old password not valid!"]);
        }else{
            return response()->json(['status' => 402,'message' => "Something went wrong!"]);
        }
    }

    public function getPucTypeRate(Request $request)
    {   
        
        $user_id = session('user')->id;
        $puc_type_id = $request->puc_type_id;

        $data['userPucRates'] = PucUserRates::where('user_id', $user_id)->where('puc_type_id', $puc_type_id)->first();
       
        return response()->json(['status' => 200,'message' => "", 'data' => $data]);
    }

    public function createPucUser(Request $request)
    {   
        // dd($request->all());
        $validatedData = $request->validate([
            'puc_type' => 'required',
            'puc_type_rate' => 'required',
            'registration_number' => 'required|max:20',
            'vehicle_model' => 'required',
            'puc_name' => 'required|max:100',
            'mobile_number' => 'required|max:15',
            'challan' => 'required',
            'chassis_number' => 'required|max:5',
            'engine_number' => 'required|max:5',
            'upload_vehicle' => 'required|image|mimes:jpeg,png,jpg,gif,JPEG,PNG,JPG,GIF|max:2048',
            'upload_challan' => 'required|image|mimes:jpeg,png,jpg,gif,JPEG,PNG,JPG,GIF|max:2048',
        ]);
   
        // Process form submission if validation passes
        
        $user_id = session('user')->id;
        $Puc = new Puc();
       
        // Update the settings with the new values
        $Puc->user_id = $user_id;
        $Puc->puc_type_id = $request->puc_type;
        $Puc->puc_type_rate = $request->puc_type_rate;
        $Puc->registration_number = $request->registration_number;
        $Puc->model = $request->vehicle_model;
        $Puc->name = $request->puc_name;
        $Puc->phone_number = $request->mobile_number;
        $Puc->challan = $request->challan;
        $Puc->chasis_number = $request->chassis_number;
        $Puc->engine_number = $request->engine_number;
        $Puc->start_date = null;
        $Puc->end_date = null;
        $Puc->status = '1';
        $Puc->rejection_reason = null;
        $Puc->date = date('Y-m-d');

        
        $req_file = 'upload_vehicle';
        $path = '/assets/uploads/puc';
        if ($request->hasFile($req_file)) {
           
            $uploadedFile = $request->file($req_file);

            $savedImage = saveSingleImage($uploadedFile, $path);
            $Puc->vehicle_image = url('/').$savedImage;
        }

        $req_file1 = 'upload_challan';
        $path1 = '/assets/uploads/aadhar';
        if ($request->hasFile($req_file1)) {
           
            $uploadedFile1 = $request->file($req_file1);

            $savedImage1 = saveSingleImage($uploadedFile1, $path1);
            $Puc->challan_image = url('/').$savedImage1;
        }
        
        // Save the changes
        $Puc->save();

        return response()->json(['status' => 200,'message' => "PUC Created Successfully!"]);
    }


    public function getPucPageData(Request $request)
    {   
        
        $user_id = session('user')->id;
        $puc_type_id = $request->puc_type_id;

        $data['puc_list'] = Puc::where('user_id', $user_id)->with(['pucType'])->get();
       
        return response()->json(['status' => 200,'message' => "", 'data' => $data]);
    }

    public function getPucFilteredData(Request $request)
    {   
        
        $user_id = session('user')->id;
        $filterFlag = $request->filterFlag;
        $param1 = $request->param1;     // for status
        $param2 = $request->param2;     // for date 1
        $param3 = $request->param3;     // for date 2

        
        if($param1 == 'pending'){
            $status = '1';
        }else if($param1 == 'completed'){
            $status = '4';
        }else{
            $status = '';
        }
        if($filterFlag == '1'){
            if($status == '' && $param2 == null){
                
                $puc_list = Puc::where('user_id', $user_id)->with(['pucType'])->get();
            
            }else if($status != '' && $param2 != null){ 
                $puc_list = Puc::where('user_id', $user_id)
                                ->where('status', $status)
                                ->whereDate('date', '=', $param2)
                                ->with(['pucType'])->get();

            } else if($status == '' && $param2 != null){ 

                $puc_list = Puc::where('user_id', $user_id)->whereDate('date', '=', $param2)->with(['pucType'])->get();
            
            }else if($status != '' && $param2 == null){ 
                
                $puc_list = Puc::where('user_id', $user_id)->where('status', $status)->with(['pucType'])->get();
            }

        } else if($filterFlag == '2'){

            if($status == '' && $param3 != null){
                $puc_list = Puc::where('user_id', $user_id)
                                ->whereDate('date', '>=', $param2)    // for start date
                                ->whereDate('date', '<=', $param3)    // for end date
                                ->with(['pucType'])->get();
            
            }else{
                $puc_list = Puc::where('user_id', $user_id)
                                ->where('status', $status)
                                ->whereDate('date', '>=', $param2)    // for start date
                                ->whereDate('date', '<=', $param3)    // for end date
                                ->with(['pucType'])->get();
            }
        }

        $data['puc_list'] = $puc_list;
       
        return response()->json(['status' => 200,'message' => "", 'data' => $data]);
    }
    
    // public function testEmail(Request $request)
    // {
        // $userDetails = User::where('id', '2')->first();
        // $body = view('emails.forget_password', $userDetails);

        
        // $userEmailsSend[] = 'hamza@5dsolutions.ae';

        // // to username, to email, from username, subject, body html
        // sendMail('hamza waheed', $userEmailsSend, 'PANCARD', 'Test email', $body);
       
        // echo 'test success';
    // }
}
