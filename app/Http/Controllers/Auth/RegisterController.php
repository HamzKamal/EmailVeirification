<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use App\Models\Verifytoken;
use App\Mail\WelcomeMail;
use Illuminate\Support\Facades\Mail;
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
            'email'=>['required','email','unique:kanoas', 'regex:/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/'],
            'Prenom'=>['required','regex:/^[a-zA-Z ]+$/'],
            'Nom'=>['required','regex:/^[a-zA-Z ]+$/'],
            'Naissance'=>'required',
            'password'=>'required|confirmed',
            'password_confirmation'=>'required',
            'accept_term'=>'accepted',
            'password' => ['required','confirmed','string', 'min:6', 'regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).+$/'],
            'password_confirmation' => ['required','string', 'min:6', 'regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).+$/'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        $user= User::create([
            'Nom'=>$data['Nom'],
            'Prenom'=>$data['Prenom'],
            'Naissance'=>$data['Naissance'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'name'=>$data['Nom'],
        ]);

        $validToken= rand(10,100..'2022');
        $get_token= new Verifytoken();
        $get_token->token=$validToken;
        $get_token->email=$data['email'];
        $get_token->save();
        $get_user_email=$data['email'];
        $get_user_name=$data['Nom'];
        Mail::to($data['email'])->send(new WelcomeMail($get_user_email, $validToken,$get_user_name));
        return $user;
    }
 }

