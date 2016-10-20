<?php
/**
 * Created by PhpStorm.
 * User: 5elements
 * Date: 5/21/2016
 * Time: 3:35 PM
 */

namespace App\Model\Admin;
use Illuminate\Database\Eloquent\Model;

class Liftner extends Model
{
    protected $table = 'liftner_details';

    protected $fillable = [
        'liftner_id','liftner_name','person_name','address','email_id','mobile_no','alt_mobile_no','created_by'
    ];
}