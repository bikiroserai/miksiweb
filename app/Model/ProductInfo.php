<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class ProductInfo extends Model
{
    protected $fillable = ['product_id','size','quantity','price','status','remarks'];
}
