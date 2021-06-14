<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class ChangePassword extends Controller
{
    public function changePassword(){
        return view('admin.changePassword');
    }

    public function updatePassword(Request $request){

        $request->validate([
            'old_password'=>'required',
            'password' =>'required|confirmed',
        ]);

        $hashedPassword = Auth::user()->password;
    
        if(Auth::check($request->old_password,$hashedPassword)){
            $user = User::findOrFail(Auth::id());
            $user->password = Hash::make($request->password);
            $user->save();
            Auth::logout();
            return redirect(url("login"))->with('success','password updated');
        }
        else {
            return back()->with('error','current password is incorrect');

        }
    }


    public function editProfile(){

        $user = Auth::user();
        
        return view('admin.profile',['user'=>$user]);
    }

    public function updateProfile(Request $request){
        
       $user = User::findOrFail(Auth::id());
        $request->validate([
            'name' =>'required',
            'email' =>'required|email',
        ]);

        $user->name=$request->name;
        $user->email=$request->email;
        $user->save();

        return back()->with('success','your data updated successfully');
    }
}
