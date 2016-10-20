<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    //
    protected $table = 'client';

    protected $fillable = ['name','address','contact_person','mobile_number','email_id','status','PAN','TAN','TIN','CIN','excise_reg_no','service_tax_reg_no'];

    public function roleable(){
         return $this->morphToMany('App\Roleable','roleable');		 
    }
	
	public function works(){
		return $this->hasMany('App\Model\Assign_work','client_id');
	}
	
}

