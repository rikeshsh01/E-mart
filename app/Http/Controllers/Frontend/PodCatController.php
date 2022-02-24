<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Brand;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PodCatController extends Controller
{
    public function pod_cat(Request $request,$id)
    {

        $catproduct=Category::FindOrFail($id);


        $sort='';
        if($request->sort !=null)
        {
            $sort=$request->sort;
        }

        if ($id == null) {
            return view('frontend.errors.404error');
        }
        else
        {
            if ($sort=='priceAsc') {
              $products=Product::where(['status'=>'active','cat_id'=>$id])->
              orWhere('child_cat_id',$id)->orderBy('price','ASC')->paginate(6);  
            //   dd($products); 
            }
            elseif($sort=='priceDesc')
            {
                $products=Product::where(['status'=>'active','cat_id'=>$id])->
                orWhere('child_cat_id',$id)->orderBy('Price','DESC')->paginate();
            }
            elseif($sort=='titleAsc')
            {
                $products=Product::where(['status'=>'active','cat_id'=>$id])->
                orWhere('child_cat_id',$id)->orderBy('title','ASC')->paginate(6);
            }
            elseif($sort=='titleDesc')
            {
                $products=Product::where(['status'=>'active','cat_id'=>$id])->
                orWhere('child_cat_id',$id)->orderBy('title','DESC')->paginate(6);
            }
            elseif($sort=='discountDesc')
            {
                $products=Product::where(['status'=>'active','cat_id'=>$id])->
                orWhere('child_cat_id',$id)->orderBy('discount','DESC')->paginate(6);
            }
            elseif($sort=='discountAsc')
            {
                $products=Product::where(['status'=>'active','cat_id'=>$id])->
                orWhere('child_cat_id',$id)->orderBy('discount','ASC')->paginate(6);
            }
            else{
                $products=Product::where(['status'=>'active','cat_id'=>$id])->
                orWhere('child_cat_id',$id)->paginate(6);

            }
        }      

        $route='product-categories';
        if ($request->ajax()) {
            $view=view('frontend.layouts.single_product',compact('products'))->render();
            return response()->json(['html'=>$view]);
            
        }
        $parentCategories=Category::with('child')->where(['parent_id'=>null,'status'=>'active'])->get();
        // dd($parentCategories);

        $parentName=Category::where(['id'=>$id,'status'=>'active'])->first('title');
        // return $parentName;
  
        // brand 
        $brand=Brand::where(['status'=>'active'])->get();
        
        return view('frontend.pages.products.categoryProduct',compact('catproduct','parentCategories','brand','route','products','parentName'));
    }
}