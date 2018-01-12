<?php

namespace App\Http\Controllers\Front;

use App\Model\Category;
use App\Model\Image;
use App\Model\Order;
use App\Model\Page;
use App\Model\Product;
use App\Model\ProductInfo;
use App\Model\User;
use Gloudemans\Shoppingcart\Cart;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use phpDocumentor\Reflection\Types\Parent_;
use Illuminate\Support\Facades\DB;
class AppController extends FrontController
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        try {

            $menProducts = DB::table('products')->join('pages','pages.id','=','products.parent_cat_id')->select('products.*','pages.name')->where('pages.name','=','Men')->orderBy('products.created_at','desc')->limit(4)->get();
            $womenProducts = DB::table('products')->join('pages','pages.id','=','products.parent_cat_id')->select('products.*','pages.name')->where('pages.name','=','Women')->orderBy('products.created_at','desc')->limit(4)->get();
            $images = Image::all();
            $infos = ProductInfo::all();
            $bestSeller = DB::table('products')->join('pages','pages.id','=','products.parent_cat_id')->select('products.*','pages.name')->inRandomOrder('products.created_at')->limit(4)->get();

            $this->data('infos',$infos);
            $this->data('menProducts',$menProducts);
            $this->data('womenProducts',$womenProducts);
            $this->data('images',$images);
             $this->data('bestSeller',$bestSeller);

        } catch (\Exception $e) {
            die($e->getMessage());
        } finally {
            return View($this->page . '.Home.home', $this->data);
        }
    }

    public function about()
    {
        try {

            $this->data('title', $this->title('About'));

        } catch (\Exception $e) {
            die($e->getMessage());
        } finally {
            return View($this->page . '.About.about', $this->data);
        }

    }

    public function single_page($id)
    {
        try {

            $products = DB::table('products')->select('products.*')->where('product_id','=',$id)->get();
            $this->data('products',$products);

            $extras = DB::table('product_infos')->select('product_infos.*')->where('product_id','=',$id)->get();
            $this->data('extras',$extras);
            foreach ($products as $info) {
                $this->data('title', $info->product_name);
            }
            $images = Image::all();
            $this->data('images',$images);

            $infos = ProductInfo::all();
            $this->data('infos',$infos);

            $bestSeller = DB::table('products')->join('pages','pages.id','=','products.parent_cat_id')->select('products.*','pages.name')->inRandomOrder('products.created_at')->limit(4)->get();
            $this->data('bestSeller',$bestSeller);

            $recentProducts = DB::table('products')->join('pages','pages.id','=','products.parent_cat_id')->select('products.*','pages.name')->orderBy('products.created_at','desc')->limit(4)->get();
            $this->data('recentProducts',$recentProducts);

        } catch (Execption $e) {
            die($e->getMessage);
        }finally{
            return view($this->page.'.SinglePage.single_page',$this->data);
        }
    }
    public function register(){
        try{
            $this->data('title', $this->title('Register'));
        }catch(\Exception $e){
            die($e->getMessage());
        }finally{
            return view($this->page.'.Register.register',$this->data);
        }
    }

    public function registerAction(Request $request){

        $this->validate($request,[
           'name'=>'required',
            'email'=>'required|email',
            'password'=>'required',
            'add1'=>'required',
        ]);

        $data['name'] = $request->name;
        $data['email'] = $request->email;
        $data['password'] = bcrypt($request->password);
        $data['address'] = $request->add1;

        if (User::create($data)){
            return redirect()->route('register')->with('success','Successfully Registered. Login now...');
        }else{
            return redirect()->back();
        }
    }

    public function loginAction(Request $request){
            $email = $request->email;
            $password = $request->password;

            if(Auth::attempt(['email'=>$email,'password'=>$password])){
                return redirect()->route('home');
            }else{
                return redirect()->back()->with('error','Email or Password is not valid.');
            }
    }

    public function logOut(){

        Auth::logout();

        return redirect()->route('register');
    }
    public function design(){
        return View($this->page . '.design.design', $this->data);
    }

    public function categoryItems($id){
        try{
            $this->data('title',$this->title('List of products'));
            $products = DB::table('products')->select('products.*')->where('products.category_id','=',$id)->paginate(15);
            $this->data('products',$products);

            $images = Image::all();
            $this->data('images',$images);

            $infos = ProductInfo::all();
            $this->data('infos',$infos);

            $bestSeller = DB::table('products')->join('pages','pages.id','=','products.parent_cat_id')->select('products.*','pages.name')->inRandomOrder('products.created_at')->limit(4)->get();
            $this->data('bestSeller',$bestSeller);

        }catch(\Exception $e){
            $e->getMessage();
        }finally{
            return view($this->page.'.category.category',$this->data);
        }
    }

    public function profile(){
        try{
            $this->data('title',$this->title('Profile'));
            $orders = DB::table('orders')->select('orders.*')->where('user_id','=',Auth::user()->id)->where('status','=',1)->get();
            $this->data('orders',$orders);
        }catch(\Exception $e){
            $e->getMessage();
        }finally{
            return view($this->page.'.Account.account',$this->data);
        }
    }

    public function orderStatus(Request $request){
        if (isset($request['disable'])){
            $data['status'] = 0;

        }
        $id = $request->_oid;
        $datas = Order::find($id);
        if ($datas::where('id',$id)->update($data)){
            return redirect()->route('profile');
        }
    }
}
