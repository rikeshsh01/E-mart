<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Banner;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Brand;

class IndexController extends Controller
{
    public function home()
    {
        $slide=Banner::where(['status'=>'active','condition'=>'banner'])->orderBy('id','DESC')->get();
        $banner=Banner::where(['status'=>'active','condition'=>'banner'])->orderBy('id','DESC')->take(2)->get();
        $product=Product::where(['status'=>'active','conditions'=>'new'])->inRandomOrder()->get();
        $latestProduct=Product::where(['status'=>'active'])->orderBy('created_at','DESC')->get();
        $categories=Category::where(['status'=>'active','is_parent'=>1])->orderBy('id','DESC')->get();

        
        return view('frontend.index',compact('slide','banner','product','latestProduct','categories'));
    }

    

    
}
