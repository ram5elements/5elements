<?php namespace App\Model\Sub_user;

use Illuminate\Database\Eloquent\Model;

class PO_Entry extends Model {

    //
    protected $table = 'po_entry';

    protected $fillable = [
       'po_name','po_entry_id','po_number','po_date','valid_date','quantity','mines_id','category_id','category_product_id','rate','advanced','freight_charges','remark','inserted_by'
    ];

}