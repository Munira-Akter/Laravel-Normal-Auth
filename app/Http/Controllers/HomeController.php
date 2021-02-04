<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Auth;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Auth\Events\Validated;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $id = auth() -> user() -> id;
       $all_user =  User::latest() -> whereNotIn('id' , [$id]) ->  get();
        return view('home',[
            'all_user' => $all_user,
        ]);
    }


    public function profile($id){
        $single_user = User::find($id);
        return view('profile',[
            'single_user' => $single_user,
        ]);
    }

    public function edit($id){
        $single_user = User::find($id);
        return view('edit',[
            'single_user' => $single_user,
        ]);
    }

    public function delete($id){
        $single_user = User::find($id);
        $single_user -> delete();
        return redirect('/home');
    }

    public function update(Request $request , $id){
        
        if($request -> hasFile('new_photo')){
            $file = $request -> file('new_photo');
            $uniquename = md5(time().rand()) . "." . $file -> getClientOriginalExtension();
            $file -> move(public_path('/media/users') , $uniquename) ;
            if(file_exists('/media/users/' . $request -> photo)){
                unlink('/media/users/' . $request -> photo);
            }
        }else{
            $uniquename = $request -> photo;
        }
        $update_user = User::find($id);
        $update_user -> name = $request -> name;
        $update_user -> username = $request -> username;
        $update_user -> email = $request -> email;
        $update_user -> cell = $request -> cell;
        $update_user -> age = $request -> age;
        $update_user -> gender = $request -> gender;
        $update_user -> location = $request -> location;
        $update_user -> photo = $uniquename;
        $update_user -> update();
        return redirect('/home');
    }
    public function single_edit(Request $request , $id){
        
        if($request -> hasFile('new_photo')){
            $file = $request -> file('new_photo');
            $uniquename = md5(time().rand()) . "." . $file -> getClientOriginalExtension();
            $file -> move(public_path('/media/users') , $uniquename) ;
            if(file_exists('/media/users/' . $request -> photo)){
                unlink('/media/users/' . $request -> photo);
            }
        }else{
            $uniquename = $request -> photo;
        }
        $update_user = User::find($id);
        $update_user -> name = $request -> name;
        $update_user -> username = $request -> username;
        $update_user -> email = $request -> email;
        $update_user -> cell = $request -> cell;
        $update_user -> age = $request -> age;
        $update_user -> gender = $request -> gender;
        $update_user -> location = $request -> location;
        $update_user -> photo = $uniquename;
        $update_user -> update();
        return redirect('/home');
    }

    public function single_profile(){
        return view('single_profile');
    }

    public function reset_password(Request $request , $id){
        $single_password = User::find($id);

        $this -> validate($request,[
            'password' => ['required', 'min:4', 'confirmed'],
        ]);

        if((password_verify($request -> old_password , $single_password -> password)) == false ){
            return with('success' , 'Password not match to ') -> back();
        }else if($request -> password != $request -> password_confirmation){
            return with('success' , 'Password not match to ') -> back();
        }else{
            $single_password -> password =  password_hash($request -> password, PASSWORD_DEFAULT);
            $single_password -> update();
            return redirect('/home');
        }
    }

    public function change_passowrd(){
        return view('changepassword');
    }
       
}
