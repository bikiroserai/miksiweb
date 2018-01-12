<?php
namespace App\Traits;

use Illuminate\Support\Facades\Config;

Trait General
{
    public $data=[];
    public function data($key,$value){
        if (empty($key)) throw new Exception('Key is not set.');
        return $this->data[$key] = $value;
    }

    public function title($back, $separator=' :: ',$front = null){
        if (!isset($front)){
            $front = Config::get('site.name');
        }
        return $front.$separator.$back;
    }
}