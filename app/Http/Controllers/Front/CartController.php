<?php

namespace App\Http\Controllers\Front;
use App\Http\Controllers\Controller;
use App\Model\Product;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;

class CartController extends FrontController
{

    public function index(){
        try {
            $this->data('title', $this->title('Cart Items'));
            $cartItems = Cart::content();
            $this->data('CartItems', $cartItems);
        }catch(\Exception $e){
            $e->getMessage();
        }finally {
            return view('cart.index', $this->data);
        }
    }

    public function getAddtocardInfo(Request $request){

      Cart::add(['id' =>$request->product_id , 'name' => $request->name, 'qty' => $request->qty, 'price' =>$request->price, 'options' => ['size' => $request->size]]);

    }

    public function removeCart($id){
        Cart::remove($id);
        return redirect()->route('cart-item');
    }
}
