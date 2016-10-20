<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Assign_work extends Model
{
    //
	 protected $table = 'assign_work';
	 
	 protected $dates = ['start_date','end_date'];

    protected $fillable = ['client_id','employee_id','work_id','status'];
	
	public function client(){
		return $this->belongsTo('App\Client','client_id');
	}
	
	public function employee(){
		return $this->belongsTo('App\Employee','employee_id');
	}
	
	public function works(){
		return $this->belongsTo('App\Model\Work_master','work_id');
	}
}
