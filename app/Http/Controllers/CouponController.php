<?php

namespace App\Http\Controllers;

use App\Models\Coupon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CouponController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $couponIndex=Coupon::orderBy('id','DESC')->get();
        return view('backend.coupon.index',compact('couponIndex'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.coupon.create');
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
            'code' =>'required|min:2',
            'value'=>'nullable|numeric',
            'type'=>'required|in:fixed,percent',
            'status'=>'required',

        ]);

        $createData= $request->all();
        $status=Coupon::create($createData);
        // error or success message
        if($status){

            return redirect()->route('coupon.index')->with('success','successfully created Coupon');

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
        $couponEdit=Coupon::find($id);
        if($couponEdit){
            return view('backend.coupon.edit',compact('couponEdit'));
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
        $couponUpdate=Coupon::find($id);
        if($couponUpdate){
            $this->validate($request,[
                'code' =>'required|min:2',
                'value'=>'nullable|numeric',
                'type'=>'required|in:fixed,percent',

    
            ]);
    
            $coupon= $request->all();
           
            // return $banner;
    
            $status=$couponUpdate->fill($coupon)->save();
    
    
            // error or success message
            if($status){
    
                return redirect()->route('coupon.index')->with('success','successfully updated Coupon');
    
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
        $couponDelete=Coupon::find($id);

        if($couponDelete){

            $status= $couponDelete->delete();

            if($status){

                return redirect()->route('coupon.index')->with('success','Coupon successfully deleted');

            }
            else{
                return back()->with('error','Data not found');
            }
        }
    }
    public function couponStatus(Request $request){
        if($request->mode=='true'){
            DB::table('coupons')->where('id',$request->id)->update(['status'=>'active']);
        }
        else
        {
            DB::table('coupons')->where('id',$request->id)->update(['status'=>'inactive']);
        }
        return response()->json(['msg'=>'Successfully updated status','status'=>'true']);
    }

    
}
