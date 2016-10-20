<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Work_master extends Model
{
    //
	 protected $table = 'work_master';
	 
	 protected $dates = ['due_date'];

    protected $fillable = ['work','due_days','fees'];
	
	// public function setDueDateAttribute($value)
	// {
		// $due_date = \Carbon\Carbon::createFromFormat('Y/m/d', $value)->toDateString();
		// $this->attributes['due_date'] = $due_date;
	// }
	
	public function works(){
		return $this->hasMany('App\Model\Work_master','id');
	}
}
