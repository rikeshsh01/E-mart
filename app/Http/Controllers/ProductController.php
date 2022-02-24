<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $productIndex=Product::all();
        // return($productIndex);
        return view('backend.product.index',compact('productIndex'));
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.product.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'title'=>'string|required',
            'summary'=>'string|required',
            'description'=>'string|nullable',
            'stock'=>'nullable|numeric',
            'price'=>'nullable|numeric',
            'discount'=>'nullable|numeric',
            'brand'=>'nullable|numeric',
            'photo'=>'required',
            'cat_id'=>'required|exists:categories,id',
            'child_cat_id'=>'nullable|exists:categories,id',
            'size'=>'nullable',
            'conditions'=>'required',
            'status'=>'nullable',
            'seller_id'=>'nullable',


        ]);
        $createData= $request->all();
// return $createData;
        $slug=Str::slug($request->input('title'));
        $slug_count=Product::where('slug',$slug)->count();
        if($slug_count>0){
            $slug = time(). '-'.$slug;
        }
        // return $slug;
        $createData['slug']=$slug;

        $createData['$offer_price']=$request->price-(($request->price*$request->discount)/100);

      

        $status=Product::create($createData);


        // error or success message
        if($status){
            // return $status;
            return redirect()->route('product.index')->with('success','successfully created product');

        }
        else{
            return back()->with('error','Something went wrong');
        }


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $productEdit=Product::find($id);
    // return $productEdit;
        if($productEdit){
            return view('backend.product.edit',compact('productEdit'));
        }
        else{
            return back()->with('error','Data not found');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $productUpdate=Product::findOrFail($id);
        if($productUpdate){
            $this->validate($request,[
            'title'=>'string|required',
            'summary'=>'string|required',
            'description'=>'string|nullable',
            'stock'=>'nullable|numeric',
            'price'=>'nullable|numeric',
            'discount'=>'nullable|numeric',
            'brand'=>'nullable|numeric',
            'photo'=>'required',
            'cat_id'=>'required|exists:categories,id',
            'child_cat_id'=>'nullable|exists:categories,id',
            'size'=>'nullable',
            'conditions'=>'required',
            'status'=>'nullable',
            'seller_id'=>'nullable',
    
            ]);
    
            $productUpdateData= $request->all();

            // if($request->is_parent==1){
            //     $categoryUpdateData['parent_id']=null;
            // }
    
            $productUpdateData['is_parent']=$request->input('is_parent',0);
            // return $banner;
    
            $status=$productUpdate->fill($productUpdateData)->save();
    
    
            // error or success message
            if($status){
    
                return redirect()->route('product.index')->with('success','successfully updated product');
    
            }
            else{
                return back()->with('error','Something went wrong');
            }
        }
        else{
            return back()->with('error','Data not found');
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
        $productDelete=Product::find($id);

        if($productDelete){

            $status= $productDelete->delete();

            if($status){

                return redirect()->route('brand.index')->with('success','Product successfully deleted');

            }
            else{
                return back()->with('error','Data not found');
            }
        }
    }

    public function productStatus(Request $request){
        if($request->mode=='true'){
            DB::table('products')->where('id',$request->id)->update(['status'=>'active']);
        }
        else
        {
            DB::table('products')->where('id',$request->id)->update(['status'=>'inactive']);
        }
        return response()->json(['msg'=>'Successfully updated status','status'=>'true']);
    }
}
