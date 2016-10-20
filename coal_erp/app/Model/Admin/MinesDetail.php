<?php namespace App\Model\Admin;

use Illuminate\Database\Eloquent\Model;

class MinesDetail extends Model {

	//
    protected $table = 'mines_details';

    protected $fillable = [
        'mines_id','company_name','person_name','address','email_id','mobile_no','alt_mobile_no','created_by'
    ];

}
