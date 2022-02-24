<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Coupon;
use Gloudemans\Shoppingcart\Facades\Cart;

class CartController extends Controller
{
    public function cartStore(Request $request)
    {
        $product_qnty=$request->input('product_quntity');
        $product_id=$request->input('product_id');
        $product= Product::getProductByCart($product_id);
        // return $product;
        $price=$product[0]['price'];
        // return $price;
        

        $result= Cart::instance('shopping')->add($product_id,$product[0]['title'],$product_qnty,$price)->associate(Product::class);

        if ($result && $request->ajax()) {
            $response['status']=true;
            $response['product_id']=$product_id;
            $response['product_qnty']=$product_qnty;
            $response['total']=Cart::subtotal();
            $response['cart_count']=Cart::instance('shopping')->count();
            $response['message']="Item is added to cart";

            $header=view('frontend.layouts.header')->render();
            $response['header']=$header;
            $response['subtotal']=Cart::subtotal();
        }
        
        return json_encode($response);
    }

    public function cartList(){
        $latestProduct=Product::where(['status'=>'active'])->orderBy('created_at','DESC')->get();
        return view('frontend.pages.cart.index',compact('latestProduct'));
    }

    public function cartDelete(Request $request)
    {
        $cart_id=$request->input('cart_id');
        Cart::instance('shopping')->remove($cart_id);
        $response['status']=true;
        $response['cart_count']=Cart::instance('shopping')->count();
        $response['message']="Item is Deleted";
        
        if ($request->ajax()) {
            $cart_list=view('frontend.layouts.cart_list')->render();
            $header=view('frontend.layouts.header')->render();
            $response['total']=Cart::subtotal();
            $response['header']=$header;
            $response['cart_list']=$cart_list;

        }
        return json_encode($response);

    }

    public function cartUpdate(Request $request){
        // dd($request->all());
        $request->validate([
            'product_qty'=>'required|numeric',
        ]);
        $rowId=$request->input('rowId');
        $req_qty=$request->input('product_qty');
        $stock_qty=$request->input('stock');

        if ($req_qty>$stock_qty) {
            $message="Currently We Donot have enough product..";
            $response['status']=false;
        }
        elseif($req_qty<1)
        {
            $message="You have to add minimum 1 item..";
            $response['status']=false;
        }
        else{
            Cart::instance('shopping')->update($rowId,$req_qty);
            $message="Cart Updated Successfully..";
            $response['status']=true;
            
        }

        if ($request->ajax()) {
            $header=view('frontend.layouts.header')->render();
            $cart_list=view('frontend.layouts.cart_list')->render();
            
            $response['header']=$header;
            $response['message']=$message;
            $response['cart_list']=$cart_list;
            $response['total']=Cart::subtotal();
            $response['cart_count']=Cart::instance('shopping')->count();

        }

        // return $response;
        return json_encode($response);
    }


    //coupon
    public function couponAdd(Request $request){
        // return $request->all();
        $coupon=Coupon::where(['code'=>$request->input('code'),'status'=>'active'])->first();
        // return $coupon;
        if ($coupon) {
            $total_price=Cart::instance('shopping')->subtotal();
            // return $total_price;
            session()->put('coupon',[
                'id'=>$coupon->id,
                'code'=>$coupon->code,
                'value'=>$coupon->discount($total_price),
            ]);
            return back()->with('success','Coupon Code added successfully');
        }
        else{
            return back()->with('error','Invalid coupon Code');
        }
    }

   
}
