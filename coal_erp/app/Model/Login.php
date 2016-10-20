<?php
/**
 * Created by PhpStorm.
 * User: 5elements
 * Date: 12/9/15
 * Time: 12:03 PM
 */

namespace App\Model;
use Illuminate\Database\Eloquent\Model as Eloquent;


class Login extends Eloquent
{
    protected $table = 'admin';

    protected $fillable = ['user_id','name','email','password', 'user_type', 'address', 'status', 'Create_by'];
}