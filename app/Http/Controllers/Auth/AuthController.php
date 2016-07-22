<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
//use App\User;
use Validator;
use App\Mailers\Confirm\UserMailer;
use App\Http\Controllers\Controller;

use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */

    use AuthenticatesAndRegistersUsers, ThrottlesLogins;

    /**
     * Where to redirect users after login / registration.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware($this->guestMiddleware(), ['except' => 'logout']);
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
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:6|confirmed',
        ],['name.required' => 'fill this']);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);
    }
     public function register(Request $request, UserMailer $mailer)
     {
      $validate  = Validator::make($request->all(), [
             'name' => 'required|max:255',
             'email' => 'required|email|max:255|unique:users',
             'password' => 'required|min:6|confirmed',
         ],['name.required' => '']);

         if($validate->fails())
         {
             return redirect()->back()
             ->withErrors($validate)->withInput();
                  }
       $user =  User::create([
        'name' => $request->input('name'),
        'email' => $request->input('email'),
             'password' => bcrypt($request->input('password')),
         ]);
         $mailer->sendEmailConfirmationTo($user);  
          return redirect()->back()->with('status','Please verify your email Address'); 
     }
  public function confirmEmail($token)
     {
        User::whereToken($token)->firstOrFail()->confirmEmail();        
        return redirect('login')->with('status','You are now confirmed. Please login.');
     } 
     
}
