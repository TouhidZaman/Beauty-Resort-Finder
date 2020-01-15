<?php

namespace App\Http\Controllers;

use App\Resort;
use App\BookingHistory;
use Illuminate\Http\Request;
use App\Role;
use App\User;
use Image;

class UserMainController extends Controller
{
    //User Profile Section
    public function getProfile($id){
        $user_id = decrypt($id);
        $user =  User::where('id', $user_id)->first();
        return View('pages.profile',['user' => $user]);
    }

    public function getEditProfile($id){
        $user_id = decrypt($id);
        $user =  User::where('id', $user_id)->first();
        return View('pages.updateProfile',['user' => $user]);
    }

    public function updateProfile(Request $request){
        $user = User::find($request->get('user_id'));
        if($request->hasFile('avatar')){
            $avatar = $request->file('avatar');
            $filename = time().'.'.$avatar->getClientOriginalExtension();
            Image::make($avatar)->resize(300,300)->save( public_path('/assets/avatars/'.$filename));
            $user->avatar = $filename;
        }
        $user->name = $request->get('name');
        $user->gender = $request->get('gender');
        $user->mobile = $request->get('mobile');
        $user->address = $request->get('address');
        if($user->Update()){
            return back()->with('success', 'Profile has been updated successfully !!');
        }else{
            return back()->with('success', 'Failed to save data !!');
        }
    }

    //for viewing all user to admin
    public function getAllUsers(){
        return View('pages.admin.allUsers');
    }

    public function removeUser($id){
        $user_id = decrypt($id);
        $user = User::find($user_id);
        $resort = Resort::where('user_id', $user_id)->first();

        $bh = BookingHistory::where('resort_id', $resort->id);
        $bh->Delete();
        
        $resorts = $user->resorts();
        $resorts->Delete();
        $booking_histories = BookingHistory::where('user_id', $user_id);
        $booking_histories->Delete();
        if($user->Delete()){
            return back()->with('success','User has been Removed');
        }else{
            return back()->with('success','Failed to Remove user');
        }
    }



    //For viewing Roles to the Admin
    public function getUserRoles(){
        $users = User::all();
        return View('pages.admin.userRoles', ['users' => $users]);
        //return $users;
    }

    // changing Roles For the Users
    public function postAdminAssignRoles(Request $request){
        $user = User::where('email', $request['email'])->first();
        $user->roles()->detach();
        if($request['role_user']){
            $user->roles()->attach(Role::where('name', 'User')->first());
        }
        if($request['role_moderator']){
            $user->roles()->attach(Role::where('name', 'Moderator')->first());
        }
        if($request['role_admin']){
            $user->roles()->attach(Role::where('name', 'Admin')->first());
        }
        return back()->with('success', 'Roles has been updated Successfully !!');
    }
}
