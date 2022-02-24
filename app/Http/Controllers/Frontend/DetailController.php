<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DetailController extends Controller
{
    public function detail($id)
    {
        $detail=Product::with('related')->where('id',$id)->first();
        // $related=Product::with('related')->where('id',$id)->first();
    //    dd($detail);

        return view('frontend.pages.products.product_detail',compact('detail'));
    }
}
