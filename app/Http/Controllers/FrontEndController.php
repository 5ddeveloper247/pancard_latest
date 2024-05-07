<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Mail;
use App\Models\User;
use App\Models\States;
use App\Models\Cities;
use App\Models\Areas;


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
                    
                    if ($user->status == 'active') {
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
