<?php

namespace App\Http\Controllers\Auth;

use Auth;
use Illuminate\Support\Facades\Input;
use DB;
use Hash;
use Session;
use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Auth\Guard as Authenticator;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\Auth\LoginRequest;
use App\Http\Requests\Auth\RegisterRequest;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;

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
     * the model instance
     * @var User
     */
    protected $user;
    /**
     * The Guard implementation.
     *
     * @var Authenticator
     */
    protected $auth;

    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct()
    {
       $this->middleware($this->guestMiddleware(), ['except' => ['logout', 'getLogout']]);
    }  

    /**
     * Show the application login form.
     *
     * @return Response
     */
    public function getLogin()
    {
        return view('auth.login');
    }

    /**
     * Handle a login request to the application.
     *
     * @param  LoginRequest  $request
     * @return Response
     */
    public function postLogin(LoginRequest $request)
    {

          $validator = Validator::make(Input::all(),
               array(
                   //'email' => 'required|email|max:255|unique:users',
                  // 'password' => 'required|min:6'
                   'email' => 'required|email',
                   'password' => 'required'
               )
           );

          if($validator->fails()) {              
               return redirect()->back()->withErrors('Please enter valid credentials.');

           } else {
                   $auth = Auth::attempt(array(
                       'email' => Input::get('email'),
                       'password' => Input::get('password')
                   ));

                   if($auth) {
					   //get logged in user data for role 'Admin'
					   $user = Auth::user();
					   $role = DB::table('roleables')->select('role_id','roleable_id')->where('roleable_id',$user->id)->where('role_id',1)->first();					   
					   
					    //set session for role 'Admin'
						Session::set('role', $role); 
                       return redirect('admin/dashboard');
                   }				   
                   else{					    
						$password =  DB::table('employees')->select('password')->where('email_id', Input::get('email'))->first();
						if($password != null){
						   if(Hash::check($request->password,$password->password)){	
						   
						     //get logged in user data for role 'Employee'
						      $empData =  DB::table('employees')->where('email_id', Input::get('email'))->first();
							  $role = DB::table('roleables')->select('role_id','roleable_id')->where('roleable_id',$empData->id)->where('role_id',3)->first();
							  //$userData = DB::table('roleables')->where('roleable_id',$empData->id)->where('role_id',3)->first();
							  
							  //set session for role 'Employee'
							  Session::set('role', $role); 
							  return redirect('employee/work_dashboard');							
						   }
						   else{							  
							  return redirect()->back()->withErrors('Please enter valid credentials.');
						   }
	                    }
						else{
							return redirect()->back()->withErrors('Please enter valid credentials.');
						}
                   }            
			}
    }

    public function getLogout()
    {
        $this->auth->logout();
        Session::flush();
        return redirect('/');
    }
}
