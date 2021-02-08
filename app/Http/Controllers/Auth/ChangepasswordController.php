<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ChangepasswordController extends Controller
{
    public function change_passowrd(){
        return view('changepassword');
    }

    public function password_update(Request  $request){
        $this -> validate($request ,[
            'old_password' => 'required',
            'password' => 'required | confirmed',
        ]);

        $haspassword = Auth::user() -> password;
        if(Hash::check($request->old_password, $haspassword)){
            $user = User::find(Auth::user()->id);
            $user -> password = Hash::make($request -> password);
            $user -> update();
            Auth::logout();
            return redirect('/login') -> with('SuccessMsg' , 'Hurray! Password Changed Successfully , Now login with your new password');
        }else{
            return redirect() -> back() -> with('DangerMsg' , 'Password does not match with your old password');
        }
}

}
