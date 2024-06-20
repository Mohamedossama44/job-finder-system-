<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Users;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function home()
    {
        return view('homepage');
    }
    public function register()
    {
        return view('register');
    }
    public function login()
    {
        return view('login');
    }
    public function register_action(Request $request){
        // validate requests
        $validator = Validator::make($request->all(), [
            'name' => 'required||max:30',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:5|max:12',
            'confirmpassword' => 'required|same:password',
        ]);
        if ($validator->fails()) {
            throw new \Exception('Invalid inputs');
        } else {
            // insert data into database
            $user = new Users([
                'email' => $request->email,
                'name' => $request->name,
                'password' => Hash::make($request->password),
                'role' => 3,
            ]);
            $save = $user->save();
            if($save){
                return redirect()->route('login')->with('success', 'Registration success. Please login!');
            }else{
                return back()->with('fail', 'Something went wrong try again later!');
            }
        }
        
    }
    public function login_action(Request $request){
        // validate requests
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:5|max:12',
        ]);
        // get user from database
        $userInfo = Users::where('email','=',$request->email)->first();
        if(!$userInfo){
            return back()->with('fail', 'We do not recognize your email address!');
        }else{
            // check password
            if(Hash::check($request->password, $userInfo->password)){
                // set user ID into session
                $request->session()->put('LoggedUser', $userInfo->userID);
                if($userInfo->role == 1){
                    return redirect()->route('adminRoute');
                }else if($userInfo->role == 2){
                    return redirect()->route('companyDashboard');
                }else{
                    return redirect()->route('jobseekerDashboard');
                }
            }else{
                return back()->with('fail', 'Incorrect password Please Try again');
            }
        }

    }
    public function logout(){
        if(session()->has('LoggedUser')){
            session()->pull('LoggedUser');
            return redirect()->route('homePage');
        }
    }
}
