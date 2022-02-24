<?php

namespace App\Http\Controllers;

use App\Models\Shipping;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ShippingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $shippingIndex=Shipping::orderBy('id','DESC')->get();
        return view('backend.shipping.index',compact('shippingIndex'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.shipping.create');
    }


    public function store(Request $request)
    {
        $this->validate($request,[
            'shipping_address' =>'required|min:2|max:255',
            'delivery_time'=>'nullable',
            'delivery_charge'=>'required',
            'status'=>'required',

        ]);

        $createData= $request->all();

        $status=Shipping::create($createData);


        // error or success message
        if($status){

            return redirect()->route('shipping.index')->with('success','successfully created Shipping');

        }
        else{
            return back()->with('error','Something went wrong');
        }


        
    }

    public function edit($id)
    {
        $shippingEdit=Shipping::find($id);
        if($shippingEdit){
            return view('backend.shipping.edit',compact('shippingEdit'));
        }
        else{
            return back()->with('error','Data not found');
        }
    }


    public function update(Request $request, $id)
    {
        $shippingUpdate=Shipping::find($id);
        if($shippingUpdate){
            $this->validate($request,[
                'shipping_address' =>'required|min:2|max:255',
            'delivery_time'=>'nullable',
            'delivery_charge'=>'required',
            ]);
    
            $shipping= $request->all();
           
            // return $banner;
    
            $status=$shippingUpdate->fill($shipping)->save();
    
    
            // error or success message
            if($status){
    
                return redirect()->route('shipping.index')->with('success','successfully updated Shipping');
    
            }
            else{
                return back()->with('error','Something went wrong');
            }
        }
        else{
            return back()->with('error','Data not found');
        }
    }


    public function destroy($id)
    {
        $shippingDelete=Shipping::find($id);

        if($shippingDelete){

            $status= $shippingDelete->delete();

            if($status){

                return redirect()->route('shipping.index')->with('success','Shipping successfully deleted');

            }
            else{
                return back()->with('error','Data not found');
            }
        }
    }


    public function shippingStatus(Request $request){
        if($request->mode=='true'){
            DB::table('shippings')->where('id',$request->id)->update(['status'=>'active']);
        }
        else
        {
            DB::table('shippings')->where('id',$request->id)->update(['status'=>'inactive']);
        }
        return response()->json(['msg'=>'Successfully updated status','status'=>'true']);
    }
}
