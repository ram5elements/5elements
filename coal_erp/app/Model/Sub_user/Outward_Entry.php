<?php namespace App\Model\Sub_user;

use Illuminate\Database\Eloquent\Model;

class Outward_Entry extends Model {

    //
    protected $table = 'outward_entry';

    protected $fillable = [
        'outward_entry_id','po_entry_id','date','vehicle_number','g_weight','t_weigth','net_weight','freight_charge','advanced','Munsiyana','other_deduction','loading_type','remark','inserted_by'
    ];
}
