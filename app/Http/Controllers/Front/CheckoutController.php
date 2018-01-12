<?php

namespace App\Http\Controllers\Front;

use App\Model\Order;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
class CheckoutController extends FrontController
{
    public function checkOut(){
        try{

            $this->data('title',$this->title('Checkout process'));
            $cartItems = Cart::content();
            $this->data('cartItems', $cartItems);
        }catch(\Exception $e) {
            $e->getMessage();
        }finally{
            return view($this->page.'.checkout.checkout',$this->data);
        }
    }

    public function checkOutAction(Request $request){

        $this->validate($request,[
            'full_name'=>'required',
            'city'=>'required',
            'address'=>'required',
            'phone'=>'required|min:7|max:10',

        ]);
        $order['full_name'] = $request->full_name;
        $order['city'] = $request->city;
        $order['address'] = $request->address;
        $order['phone'] = $request->phone;
        $order['product_id'] = $request->product_id;
        $order['product_name'] = $request->name;
        $order['size'] = $request->size;
        $order['quantity'] = $request->quantity;
        $order['price'] = $request->price;
        $order['user_id'] = $request->user_id;

        if (Order::create($order)){
            Cart::destroy();
//            $datas = DB::table('products')->join('product_infos','product_infos.product_id','=','products.product_id')->select('product_infos.*')->where('size','=',$order['size'])->get();
//            print_r($datas); exit;
            $this->data('title',$this->title('Payment Process'));
            return view($this->page.'.Payment.payment',$this->data);
        }
    }
}
