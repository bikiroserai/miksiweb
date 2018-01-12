<?php

namespace App\Http\Controllers\Front;

use App\Model\Category;
use App\Model\Page;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FrontController extends Controller
{
    protected $AppType='Front';
    protected $Page;
    public function __construct()
    {
        $this->data('title',$this->title('Home'));
       $this->page = $this->AppType.'.Page';
        $pages = Page::all();
        $categories = Category::all();
        $this->data('categories',$categories);
        $this->data('pages',$pages);

    }
}
