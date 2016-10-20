<?php
/**
 * Created by PhpStorm.
 * Sub_user: 5elements
 * Date: 4/28/2016
 * Time: 2:45 PM
 */

namespace App\Model\Sub_user;
use Illuminate\Database\Eloquent\Model;
class party_details extends model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'party_details';

    protected $fillable=['Party_Id','company_name','person_name','address','email_id','mobile_no','alt_mobile_no','created_by'];

}