<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    protected $primaryKey = 'img_id';
    protected $fillable = ['product_id','img_name','img_status','remarks'];
}
