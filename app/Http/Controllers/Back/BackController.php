<?php

namespace App\Http\Controllers\Back;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
class BackController extends Controller
{

    protected $AppType = 'Admin.';

    Protected $pages;

    public function __construct()
    {
        $this->middleware('auth:admin');
        $this->data('title', $this->title('Dashboard'));
        $this->pages = $this->AppType.'Pages.';
        $uCount = DB::table('users')->where('notification','=',1)->count();
        $this->data('uCount',$uCount);
        $oCount = DB::table('orders')->where('notification','=',1)->count();
        $this->data('oCount',$oCount);


    }
}
