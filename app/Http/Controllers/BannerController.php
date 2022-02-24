<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;



class BannerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bannerIndex=Banner::orderBy('id','DESC')->get();
        return view('backend.banners.index',compact('bannerIndex'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.banners.create');
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
            'condition'=>'required',
            'status'=>'required',

        ]);

        $createData= $request->all();
        $slug=Str::slug($request->input('title'));

        $slug_count=Banner::where('slug',$slug)->count();
        if($slug_count>0){
            $slug .= time(). '-'.$slug;
        }
        $createData['slug']=$slug;

        // return $banner;

        $status=Banner::create($createData);


        // error or success message
        if($status){

            return redirect()->route('banner.index')->with('success','successfully created banner');

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
        $bannerEdit=Banner::find($id);
        if($bannerEdit){
            return view('backend.banners.edit',compact('bannerEdit'));
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
        $bannerUpdate=Banner::find($id);
        if($bannerUpdate){
            $this->validate($request,[
                'title' =>'required|min:2|max:255',
                'description'=>'nullable',
                'photo'=>'required',
                'condition'=>'required',
                'status'=>'required',
    
            ]);
    
            $banner= $request->all();
           
            // return $banner;
    
            $status=$bannerUpdate->fill($banner)->save();
    
    
            // error or success message
            if($status){
    
                return redirect()->route('banner.index')->with('success','successfully updated banner');
    
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
        $bannerDelete=Banner::find($id);

        if($bannerDelete){

            $status= $bannerDelete->delete();

            if($status){

                return redirect()->route('banner.index')->with('success','Banner successfully deleted');

            }
            else{
                return back()->with('error','Data not found');
            }
        }
    }

    public function bannerStatus(Request $request){
        if($request->mode=='true'){
            DB::table('banners')->where('id',$request->id)->update(['status'=>'active']);
        }
        else
        {
            DB::table('banners')->where('id',$request->id)->update(['status'=>'inactive']);
        }
        return response()->json(['msg'=>'Successfully updated status','status'=>'true']);
    }
}
