<?php
/**
 * Created by PhpStorm.
 * Sub_user: 5elements
 * Date: 4/28/2016
 * Time: 2:45 PM
 */

namespace App\Model\Sub_user;
use Illuminate\Database\Eloquent\Model;

class DO_Entry extends Model  {


    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'do_entry';

    protected $fillable = ['do_number','do_name','do_date','valid_date','quantity','mines_id','category_id','category_product_id','rate','advanced','freight_charges','remark','inserted_by'];

}