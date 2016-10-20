<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Session;

class Roleable extends Model
{
    //
	protected $table = 'roleables';

    protected $fillable = ['role_id','roleable_id','roleable_type'];
	
    public function roleable(){
		return $this->morphTo();
	}

     public function users(){
         return $this->morphedByMany('App\User','roleable');
    }

    public function clients(){
         return $this->morphedByMany('App\Client','roleable');
    }

    public function employees(){
         return $this->morphedByMany('App\Employee','roleable');
    }	
	
	public static function hasRole($role) {       
      if (Session::has('role')) {		  
		  $role_id = Session::get('role')->role_id;		  
		  if($role_id == $role)
		  {
			 return true;
	      }
      }
	} 
	
	public static function getLoggedInUserId() {       
      if (Session::has('role')) {		  
		  $user_id = Session::get('role')->roleable_id;		  
		   return $user_id;	      
      }
	} 
	
	public static function getLoggedInUser() {       
      if (Session::has('role')) {	
		  $role_id = Session::get('role')->role_id;	
		  $user_id = Session::get('role')->roleable_id;		  	
		  if($role_id == 1) //for role Admin
		  {
			$user = \Auth::user();
		    return $user->name;	 
	      }
		  else //for ($role_id == 3)i.e. employee
		  {
			$user =  Employee::find($user_id) ;
			return $user->name;
		  }
      }
	} 
}
