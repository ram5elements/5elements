<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    //
    protected $table = 'employees';

    protected $fillable = ['name','father_name','address','mobile_number','email_id','password'];

    public function roleables(){
         return $this->morphToMany('App\Roleable','roleable');		 
    }
	
	public function works(){
		return $this->hasMany('App\Model\Assign_work','employee_id');
	}
}
