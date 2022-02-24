<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Product;
use App\Models\Shipping;
use App\Models\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Gloudemans\Shoppingcart\Facades\Cart;
class CheckoutController extends Controller
{
     //checkot
     public function checkout1()
     {
        $latestProduct=Product::where(['status'=>'active'])->orderBy('created_at','DESC')->get();

         return view('frontend.pages.checkout.checkout1',compact('latestProduct'));
     }

     public function checkout1store(Request $request)
     {

     //    return $request->all();
          Session::put('checkout',[
          'first_name'=>$request->first_name,
          'last_name'=>$request->last_name,
          'email'=>$request->email,
          'phone'=>$request->phone,
          'address'=>$request->address,
          'country'=>$request->country,
          'sfirst_name'=>$request->sfirst_name,
          'slast_name'=>$request->slast_name,
          'semail'=>$request->semail,
          'sphone'=>$request->sphone,
          'saddress'=>$request->saddress,
          'scountry'=>$request->scountry,
     ]);

     $shipping = Shipping::where(['status'=>'active'])->orderBy('created_at','DESC')->get();

     return view('frontend.pages.checkout.checkout2',compact('shipping'));
     }

     public function checkout2store(Request $request){
          Session::push('checkout',[
               'delivery_charge'=>$request->delivery_charge,
          ]);

          return view('frontend.pages.checkout.checkout3');

     }

     public function checkout3store(Request $request){
          // Session::push('checkout',[
          //      'payment_method'=>$request-> payment_method,
          //      'payment_status'=>'paid',
          // ]);
               $data=$request->all();
               return response()->json($data);

     }

}
