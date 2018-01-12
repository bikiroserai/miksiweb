<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $primaryKey = 'product_id';
    protected $fillable = ['product_name','parent_cat_id','category_id','product_details','product_discount','front_thumbnail','back_thumbnail','product_status'.'remarks'];
}
