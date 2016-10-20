<?php namespace App\Model\Admin;

use Illuminate\Database\Eloquent\Model;

class UserDetail extends Model {

    //
    protected $table = 'user_details';

    protected $fillable = [
        'user_id','name','address','email_id','user_type','mobile_no','alt_mobile_no','zone', 'password','created_by'
    ];

}