<?php
/**
 * Created by PhpStorm.
 * Sub_user: 5elements
 * Date: 4/28/2016
 * Time: 2:45 PM
 */

namespace App\Model\Admin;
use Illuminate\Database\Eloquent\Model;

class Product extends Model  {


    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'category_product';

    protected $fillable = ['category_product_id','category_id','product_name','product_desc'];

}