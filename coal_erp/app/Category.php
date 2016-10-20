<?php
/**
 * Created by PhpStorm.
 * User: 5elements
 * Date: 4/28/2016
 * Time: 2:45 PM
 */

namespace App;
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