<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'cell' => ['required', 'string',  'max:25', 'unique:users'],
            'username' => ['required', 'string',  'max:10', 'unique:users'],
            'password' => ['required', 'string', 'min:4', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create($request){

    $photo ='avater.png';
    if($request -> hasFile('photo')){
        $img = $request -> file('photo');
        $photo = md5(time().rand()).'.'.$img -> getClientOriginalExtension();
        $img -> move(public_path('/media/users/') , $photo ) ;

    }

    
        return User::create([
            'name' => $request -> name,
            'email' => $request -> email,
            'cell' => $request -> cell,
            'username' => $request -> username,
            'gender' => $request -> gender,
            'age' => $request -> age,
            'location' => $request -> location,
            'photo' => $photo,
            'password' => password_hash($request -> password , PASSWORD_DEFAULT),
        ]);
    }
}
