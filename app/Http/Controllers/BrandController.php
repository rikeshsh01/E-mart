<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $brandIndex=Brand::orderBy('id','DESC')->get();
        return view('backend.brand.index',compact('brandIndex'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.brand.create');
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
            'title' =>'required|min:2|max:255',
            'description'=>'nullable',
            'photo'=>'required',
            'status'=>'required',

        ]);

        $createData= $request->all();
        $slug=Str::slug($request->input('title'));

        $slug_count=Brand::where('slug',$slug)->count();
        if($slug_count>0){
            $slug .= time(). '-'.$slug;
        }
        $createData['slug']=$slug;

        // return $banner;

        $status=Brand::create($createData);


        // error or success message
        if($status){

            return redirect()->route('brand.index')->with('success','successfully created Brand');

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
        $brandEdit=Brand::find($id);
        if($brandEdit){
            return view('backend.brand.edit',compact('brandEdit'));
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
        $brandUpdate=Brand::find($id);
        if($brandUpdate){
            $this->validate($request,[
                'title' =>'required|min:2|max:255',
                
                'photo'=>'required',
                
    
            ]);
    
            $brand= $request->all();
           
            // return $banner;
    
            $status=$brandUpdate->fill($brand)->save();
    
    
            // error or success message
            if($status){
    
                return redirect()->route('brand.index')->with('success','successfully updated banner');
    
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
        $brandDelete=Brand::find($id);

        if($brandDelete){

            $status= $brandDelete->delete();

            if($status){

                return redirect()->route('brand.index')->with('success','Brand successfully deleted');

            }
            else{
                return back()->with('error','Data not found');
            }
        }
    }

    public function brandStatus(Request $request){
        if($request->mode=='true'){
            DB::table('brands')->where('id',$request->id)->update(['status'=>'active']);
        }
        else
        {
            DB::table('brands')->where('id',$request->id)->update(['status'=>'inactive']);
        }
        return response()->json(['msg'=>'Successfully updated status','status'=>'true']);
    }
}
