<?php
/**
 * Created by PhpStorm.
 * Sub_user: 5elements
 * Date: 4/28/2016
 * Time: 2:45 PM
 */

namespace App\Model\Admin;
use Illuminate\Database\Eloquent\Model;

class Category extends Model  {


    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'category';

    protected $fillable = ['category_id','category_name','description'];

}