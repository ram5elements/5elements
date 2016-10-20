<?php
/**
 * Created by PhpStorm.
 * Sub_user: 5elements
 * Date: 4/28/2016
 * Time: 2:45 PM
 */

namespace App\Model\Sub_user;
use Illuminate\Database\Eloquent\Model;
class Add_Payment extends model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'addpayment';

    protected $fillable=['Party_Id','Date','NameOfParty','AmountReceived','AmountPaid','remark'];

}