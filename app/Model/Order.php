<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = ['full_name','city','address','phone','product_id','product_name','size','price','user_id','quantity','status','remarks'];
}
