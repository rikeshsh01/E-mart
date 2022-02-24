<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Gloudemans\Shoppingcart\Facades\Cart;
use PhpParser\Node\Stmt\Catch_;

class WishlistController extends Controller
{
    public function wishlist()
    {
        $latestProduct=Product::where(['status'=>'active'])->orderBy('created_at','DESC')->get();
        return view('frontend.pages.wishlist.index',compact('latestProduct'));
    }

    public function wishlistStore(Request $request)
    {
        // dd($request->all());
        $product_id=$request->input('product_id');
        $product_qty=$request->input('product_quntity');
        $product=Product::getProductByCart($product_id);
        // dd($product);
        $price=$product[0]['price'];
        // dd($price);
        $wishlist_array=[];
        
        foreach (Cart::instance('wishlist')->content() as $item) {
            $wishlist_array[]=$item->id;
        }
        if(in_array($product_id,$wishlist_array))
        {
            $response['present']=true;
            $response['message']="Item has already in wishlist";
            
        }
        else
        {
            $result= Cart::instance('wishlist')->add($product_id,$product[0]['title'],$product_qty,$price)->associate('App\Models\Product');
            if ($result) {
                $response['status']=true;
                $response['message']="Item has been saved in wishlist";
                $response['wishlist_count']=Cart::instance('wishlist')->count();

            }
        }

        if ($request->ajax()) {
            $header=view('frontend.layouts.header')->render();
            
            $response['header']=$header;


        }
        return json_encode($response);

    }

    public function moveToCart(Request $request)
    {
        $item=Cart::instance('wishlist')->get($request->input('rowId'));
        Cart::instance('wishlist')->remove($request->input('rowId'));

        $result=Cart::instance('shopping')->add($item->id,$item->name,1,$item->price)->associate('App\Models\Product');

        if ($result) {
            $response['status']=true;
            $response['message']="Item has been move to cart";
            $response['cart_count']=Cart::instance('shopping')->count();
        }
        if ($request->ajax()) {
            $header=view('frontend.layouts.header')->render();
            $response['header']=$header;


        }

        return $response;
    }


    public function wishlistDelete(Request $request)
    {
        $id=$request->input('rowId');
        Cart::instance('wishlist')->remove($id);
        
        $response['status']=true;
        $response['message']="Deleted from wishlist";
        $response['cart_count']=Cart::instance('shopping')->count();
        
        if ($request->ajax()) {
            $header=view('frontend.layouts.header')->render();
            $response['header']=$header;


        }

        return $response;
    }

    
}
