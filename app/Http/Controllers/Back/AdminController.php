<?php

namespace App\Http\Controllers\Back;

use App\Model\Category;
use App\Model\Order;
use App\Model\Page;
use App\Model\Product;
use App\Model\ProductInfo;
use App\Model\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Image;

class AdminController extends BackController
{

    public function __construct()
    {

        parent::__construct();
    }

    public function index(){

        try{

            $allProducts = DB::table('products')->join('categories', 'products.category_id', '=', 'categories.category_id')->select('products.*', 'categories.category_name')->orderBy('created_at', 'desc')->paginate(15);
            $this->data('allProducts',$allProducts);
            $this->data('title',$this->title('Products'));

        }catch (\Exception $e){

            $e->getMessage();

        }finally{

            return view($this->pages.'Products.Show-products',$this->data);

        }
    }

    public function selectCategory(Request $request){

        $data = Category::select('category_id','category_name')->where('parent_id',$request->pid)->get();
        return response()->json($data);
    }

    public function addProducts(){
        try{
            $categories = Page::all();
            $this->data('parentCategories',$categories);
            $this->data('title',$this->title('Add Products'));
        }catch(\Exception $e){
            $e->getMessage();
        }finally{
            return view($this->pages.'Products.add-products', $this->data);
        }
    }

    public function addProductsAction(Request $request){

        $this->validate($request,[
           'name'=>'required',
            'parent_cat_id'=>'required',
            'category_id' => 'required',
            'price'=>'required',
            'quantity'=>'required',
            'size'=>'required',
        ]);

        $info['product_name'] = $request->name;
        $info['parent_cat_id'] = (int)$request->parent_cat_id;
        $info['category_id'] = (int)$request->category_id;
        $info['product_discount'] = $request->discount;
        $info['product_details'] = $request->details;
        $info['product_price'] = (double)$request->price;
        $data['quantity'] = (int)$request->quantity;
        $data['size'] = $request->size;


        $isExist = DB::table('products')->select('product_id')->where('parent_cat_id','=',$info['parent_cat_id'])->where('product_name','=',$info['product_name'])->get();
        if (count($isExist)>0){
            foreach ($isExist as $key=>$is){

                $data['product_id'] = $is->product_id;
                if (ProductInfo::create($data)){
                    return redirect()->route('show-products')->with('success','Products has been Inserted');
                }
            }
        }
        else {
            $infos = Product::create($info);
            if ($infos) {
                $data['product_id'] = $infos->product_id;
                $this->data('id',$infos->product_id);
                $this->data('title',$this->title('Add Images'));
                if (ProductInfo::create($data)) {
                    return view($this->pages.'Products.add-image',$this->data);
                }

            }
        }
                return redirect()->back();
    }

    public function showProducts(){
        try {
            $allProducts = DB::table('products')->join('product_infos','product_infos.product_id','=','products.product_id')->join('pages','pages.id','=','products.parent_cat_id')->select('products.*','product_infos.*','pages.name')->where('product_infos.status','=',1)->orderBy('products.created_at','desc')->paginate(15);

                $images = DB::table('images')->join('products', 'products.product_id', '=', 'images.product_id')->select('images.*')->get();

            $this->data('images',$images);
            $this->data('allProducts',$allProducts);
            $this->data('title',$this->title('Products List'));
        }catch(\Exception $e){
            $e->getMessage();
        }finally{
            return view($this->pages.'Products.show-products',$this->data);
        }
    }

    public function updateProductStatus(Request $request){
        $id = $request->_prid;
        if (isset($request['enable'])){
            $data['status'] = 1;
            $message = 'Products has been Enabled';
        }
        if (isset($request['disable'])){
            $data['status'] = 0;
            $message = 'Products has been Disabled';
        }

        $datas = ProductInfo::find($id);
        if ($datas::where('id',$id)->update($data)){
            return redirect()->route('show-products')->with('success',$message);
        }
    }

    public function updateUserStatus(Request $request){
        $id = $request->_uid;
        if (isset($request['enable'])){
            $data['status'] = 1;
            $message = 'Products has been Enabled';
        }
        if (isset($request['disable'])){
            $data['status'] = 0;
            $message = 'Products has been Disabled';
        }

        $datas = User::find($id);
        if ($datas::where('id',$id)->update($data)){
            return redirect()->route('admin')->with('success',$message);
        }
    }

    public function editProduct($id){

        if((int)$id){
            $this->data('title',$this->title('Edit Products'));
            $pages = Page::all();
            $this->data('pages',$pages);
            $categories = Category::all();
            $this->data('categories',$categories);
            $details = DB::table('products')->join('product_infos','product_infos.product_id','=','products.product_id')->join('pages','pages.id','=','products.parent_cat_id')->select('products.*','product_infos.*','pages.name')->where('product_infos.id','=',$id)->get();

            $this->data('details',$details);

            return view($this->pages.'Products.edit-products', $this->data);

        }else{

            return redirect()->back();
        }
    }

    public function editProductAction(Request $request){
        $this->validate($request,[
            'name'=>'required',
//            'parent_cat_id'=>'required',
            'category_id' => 'required',
            'price'=>'required',
            'quantity'=>'required',
            'size'=>'required',
        ]);

        $info['product_name'] = $request->name;
        $info['parent_cat_id'] = (int)$request->parent_cat_id;
        $info['category_id'] = (int)$request->category_id;
        $info['product_price'] = (double)$request->price;
        $data['quantity'] = (int)$request->quantity;
        $data['size'] = $request->size;
        $pid  = $request->_pid;
        $pd = $request->_piid;

        $product = Product::find($pid);
        if($product::where('product_id',$pid)->update($info)){
            $pinfo = ProductInfo::find($pd);
            if ($pinfo::where('id',$pd)->update($data)){
                return redirect()->route('show-products')->with('success','Data has been updated.');
            }
        }

    }

    public function category(){
        try{
            $this->data('parents',DB::table('pages')->get());
            $allCategories = DB::table('categories as c')->join('pages as p','p.id','=','c.parent_id')->select('c.category_id','c.status','c.category_name','p.name')->paginate(10);
            $this->data('allCategories',$allCategories);
            $this->data('title',$this->title('Category'));
        }catch(\Exception $e){
            $e->getMessage();
        }finally{
            return view($this->pages.'Products.Category',$this->data);
        }
    }


    public function addCategoryAction(Request $request){

        $this->validate($request,[
            'categoryName'=>'required|max:20',
            'sub_category'=>'required'
        ]);

        $data['category_name'] = $request->categoryName;
        $data['parent_id'] = $request->sub_category;

//        if ($request->hasFile('thumbnail')) {
//
//            $image = $request->file('thumbnail');
//            $uploadPath = public_path('Images/Thumbnails/');
//            $ext = $image->getClientOriginalExtension();
//            $imageName = date('Ymdhis') . '.' . $ext;
//
//            $make = Image::make($image);
//            $save = $make->resize(640, 424, function ($ar) {
//                $ar->aspectRatio();
//            })->crop(640, 424)->save($uploadPath . $imageName);
//
//            if ($save) {
//                $data['thumbnails'] = $imageName;
//            }
//        }

            if (Category::create($data)) {
                return redirect()->route('category')->with('success', 'Category has been Added.');
            } else {
                return redirect()->back();
            }
    }
    public function pages(){
        try{
            $pages = Page::paginate(5);
            $this->data('pages',$pages);
            $this->data('title',$this->title('Pages'));
        }catch(\Exception $e){
            $e->getMessage();
        }finally{
            return view($this->pages.'Page.Pages',$this->data);
        }
    }

    public function addPageAction(Request $request){

        $this->validate($request,[
            'pageName'=>'required|max:20',

        ]);

        $data['name'] = $request->pageName;

            if(Page::create($data)){
            return redirect()->route('page')->with('success','Page has been Added.');
        }
        else{
            return redirect()->back();
        }
    }

    public function deletePage($id){
        $id = $id;
        $data = Page::find($id);
        if($data->delete()){
            return redirect()->route('page')->with('success','Page has been Deleted.');
        }
        else{
            return redirect()->back();
        }
    }

    public function deleteCategory($id){

        $data = Category::find($id);
        if($data->delete()){
            return redirect()->route('category')->with('success','Category has been Deleted.');
        }
        else{
            return redirect()->back();
        }
    }

    public function allTable(){
        try{
            $this->data('allCategories',Category::paginate(5));
            $this->data('pages',Page::paginate(5));
            $this->data('allProducts',Product::paginate(5));

            $this->data('title',$this->title('Tables List'));
        }catch(\Exception $e){
            $e->getMessage();
        }finally{
            return view($this->pages.'Tables.All-tables',$this->data);
        }
    }

    public function updateCategoryStatus(Request $request){
        $id = $request->_cId;

        if (isset($request['enable'])){

            $data['status'] = 1;
            $message = 'Category has been Enabled.';
        }
        if (isset($request['disable'])){

            $data['status'] = 0;
            $message = 'Category has been Disabled.';
        }
        $category = Category::find($id);

        if($category::where('category_id',$id)->update($data)){
            return redirect()->route('category')->with('success',$message);
        }

    }

    public function updatePageStatus(Request $request){
        $id = $request->_pId;

        if(isset($request['enable'])){
            $data['status'] = 1;
            $message = "Page has been Enabled.";
        }
        if (isset($request['disable'])){
            $data['status'] = 0;
            $message = 'Page has been Disabled.';
        }

        $page = Page::find($id);
        if($page::where('id',$id)->update($data)){
            return redirect()->route('page')->with('success',$message);
        }
    }

    public function logOut(){
        Auth::logout();
        return redirect()->route('login');
    }

    public function addImageAction(Request $request){

        $this->validate($request,[
            'details'=>'required',
            'discount'=>'required',
            'image'=>'required',
        ]);

        $info['product_discount'] = $request->discount;
        $info['product_details'] = $request->details;
        $img['product_id']  = $request->_pid;
        if ($request->hasFile('image')) {

            $images = $request->file('image');
            $uploadPath = public_path('Images/Thumbnails/');
            foreach ($images as $key=>$image) {
                $ext = $image->getClientOriginalExtension();
                $imageName = date('Ymdhis') . '-' . str_random(6) . '.' . $ext;

                $make = Image::make($image);
                $save = $make->resize(300, 400, function ($ar) {
                    $ar->aspectRatio();
                })->crop(300, 400)->save($uploadPath . $imageName);
                if ($save) {
                    $img['img_name'] = $imageName;
                }
                \App\Model\Image::create($img);
            }
        }
        $product = Product::find($img['product_id']);
        if ($product::where('product_id',$img['product_id'])->update($info)) {
            return redirect()->route('show-products')->with('success', 'Product Information has been inserted.');
        }
    }

    public function orders(){
        try{
            $data['notification'] = 0;
            DB::table('orders')->update($data);
            $this->data('title',$this->title('Orders'));
            $orders = DB::table('orders')->select('orders.*')->orderBy('created_at','desc')->paginate(10);
            $this->data('orders',$orders);
        }catch(\Exception $e){
            $e->getMessage();
        }finally{
            return view($this->pages.'Orders.order',$this->data);
        }
    }

    public function usersList(){
        try{
            $data['notification'] = 0;
            DB::table('users')->update($data);
            $this->data('title',$this->title('Users List'));
            $users = DB::table('users')->select('users.*')->orderBy('created_at','desc')->paginate(10);
            $this->data('users',$users);
        }catch(\Exception $e){
            $e->getMessage();
        }finally{
            return view($this->pages.'Users.user-list',$this->data);
        }
    }
}
