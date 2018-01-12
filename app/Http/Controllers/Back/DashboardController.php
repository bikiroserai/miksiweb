<?php

namespace App\Http\Controllers\Back;

class DashboardController extends BackController
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index(){
        try{

        }catch (\Exception $e){
            $e->getMessage();
        }finally{
            return view($this->pages.'Dashboard.Dashboard',$this->data);
        }
    }
}

