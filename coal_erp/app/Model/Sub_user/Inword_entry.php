<?php
/**
 * Created by PhpStorm.
 * Sub_user: 5elements
 * Date: 4/28/2016
 * Time: 2:45 PM
 */

namespace App\Model\Sub_user;
use Illuminate\Database\Eloquent\Model;

class Inword_entry extends Model  {


    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'inward_entry';

    protected $fillable = ['inward_entry_id	','do_entry_id','vehicle_number','recieve_date','gatepass_number','get_pass_date','g_weight','t_weight','net_weight','freight_charge','shortage_amount','shortage','advanced','Munsiyana','other_deduction','remark','inserted_by'];


}