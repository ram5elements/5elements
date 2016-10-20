<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Auth;
use Input;
use Session;
use Illuminate\Http\Request;
use App\Registration_master;
use App\User;
use Redirect;
use DB;


class LoginController extends Controller {

    /**
     * Show the application welcome screen to the user.
     *
     * @return Response
     */
    public function login()
    {
        return view('login');
    }
    public function checklogin(User $user)
    {
        $password = Input::get('password');
        $email = Input::get('email');
        $status = DB::table('admin')->select('status')->where('email', $email)->first();
        $role_id = DB::table('admin')->select('user_type')->where('email', $email)->first();

        if (Auth::attempt(array('password' => $password, 'email' => $email)))
        {
            $user_data1 = User::where('email', $email)->first();
            Session::set('user_data', $user_data1);
            switch ($role_id->user_type) {
                case "1":
                    if($status->status == "ACTIVE")
                    {
                        return redirect('admin/dashboard');
                    }
                    else
                    {
                        return redirect()->back()->with('message', 'Invalid Login');
                    }
                    break;
                case "2":
                    if($status->status == "ACTIVE")
                    {
                        return redirect('user/dashboard');
                    }
                    else
                    {
                        return redirect()->back()->with('message', 'Invalid Login');
                    }
                    break;
                default:
                    return redirect()->back()->with('message', 'provided valid emailId and password');
            }
        }
        else{
            return redirect()->back()->with('message', 'provided valid emailId and password');
        }
    }
    public  function user_logout()
    {
        Session::flush();
        return redirect('/');
    }

}
