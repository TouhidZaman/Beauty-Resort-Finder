<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Validator;
use Auth;
use App\User;
use App\Role;

class UserRegLoginController extends Controller
{
    public function insertData(Request $request){
        $user_email = $request->get("email");
        if(User::all()->where('email', $user_email)->first() == null){
            $user_data = new User();
            try{

                $user_data-> name = $request->get("name");
                $user_data-> gender = $request->get("gender");
                $user_data-> mobile = $request->get("mobile");
                $user_data-> email = $user_email;
                $user_data-> address = $request->get("address");
                $user_data-> password = Hash::make($request->get("password"));
                if ($user_data->Save()) {
                    $user_data->roles()->attach(Role::where('name', 'User')->first());
                    return redirect('/')->with('success', 'Registration Successfully Completed');
                } else {
                    echo "Registration Failed";
                }
            }
            catch (Exception $exception){
                echo $exception->getMessage();
            }
        }else{
            return back()->with('error', 'You are already registered !! please login or reset your account');
        }


    }

    public function checkLogin(Request $request){

        $user_data = array(
            'email' => $request->get("user_login_email"),
            'password'   => $request->get("user_login_password")
        );
        if(Auth::attempt($user_data)){
            $user = Auth::user(); //Get the Current User
            $role=$user->roles->first()->name;
            if($role == 'Admin'){
                return redirect('admin/dashboard');
                //return 'Admin dashboard';
            }else{
                return redirect('user/dashboard');
                //return 'User dashboard';
            }
        }else{
            return back()->with('error', 'wrong login detail');
        }

    }
    function logout(){
        Auth::logout();
        return redirect('/');
    }
}
