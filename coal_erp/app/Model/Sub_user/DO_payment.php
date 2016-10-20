<?php
/**
 * Created by PhpStorm.
 * Sub_user: 5elements
 * Date: 4/28/2016
 * Time: 2:45 PM
 */

namespace App\Model\Sub_user;
use Illuminate\Database\Eloquent\Model;

class DO_payment extends Model  {


    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'DO_payment';

    protected $fillable = ['DO_payment_id','inward_entry_id','amount','remark','inserted_by'];

}