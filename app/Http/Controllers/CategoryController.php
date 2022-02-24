<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categoryIndex=Category::orderBy('id','DESC')->get();
        return view('backend.category.index',compact('categoryIndex'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $parent_cats=Category::where('is_parent',1)->orderBy('title','ASC')->get();

        return view('backend.category.create',compact('parent_cats'));
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
            'summary'=>'nullable',
            // 'photo'=>'required',
            'is_parent'=>'sometimes|in:1',
            'parent_id'=>'nullable|exists:categories,id',
            'status'=>'nullable',

        ]);

        $createData= $request->all();

        $slug=Str::slug($request->input('title'));

        $slug_count=Category::where('slug',$slug)->count();
        if($slug_count>0){
            $slug .= time(). '-'.$slug;
        }
        $createData['slug']=$slug;


        $createData['is_parent']=$request->input('is_parent', 0);

        

        // return $banner;

        $status=Category::create($createData);


        // error or success message
        if($status){

            return redirect()->route('category.index')->with('success','successfully created category');

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
        

        $parent_cats=Category::where('is_parent',1 )->orderBy('title','ASC')->get();
        // return($parent_cats);
        $categoryEdit=Category::findOrFail($id);
        // return($categoryEdit);
        
        if($categoryEdit){
            return view('backend.category.edit',compact(['categoryEdit','parent_cats']));
        }
        else{
            return back()->with('error','Category not found');
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
        $categoryUpdate=Category::findOrFail($id);
        if($categoryUpdate){
            $this->validate($request,[
                'title' =>'required|min:2|max:255',
                'summary'=>'nullable',
                // 'photo'=>'required',
                'is_parent'=>'sometimes|in:1',
                'parent_id'=>'nullable|exists:categories,id',
                'status'=>'nullable',
    
            ]);
    
            $categoryUpdateData= $request->all();

            // if($request->is_parent==1){
            //     $categoryUpdateData['parent_id']=null;
            // }
    
            $categoryUpdateData['is_parent']=$request->input('is_parent',0);
            // return $banner;
    
            $status=$categoryUpdate->fill($categoryUpdateData)->save();
    
    
            // error or success message
            if($status){
    
                return redirect()->route('category.index')->with('success','successfully updated banner');
    
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
        $categoryDelete=Category::find($id);
        $child_cat_id=Category::where('parent_id',$id)->pluck('id');

        if($categoryDelete){

            $status= $categoryDelete->delete();
            if(count($child_cat_id)>0)
            {
                Category::shiftChild($child_cat_id);
            }

            if($status){

                return redirect()->route('category.index')->with('success','Category successfully deleted');

            }
            else{
                return back()->with('error','Data not found');
            }
        }
    }

    public function categoryStatus(Request $request){
        if($request->mode=='true'){
            DB::table('categories')->where('id',$request->id)->update(['status'=>'active']);
        }
        else
        {
            DB::table('categories')->where('id',$request->id)->update(['status'=>'inactive']);
        }
        return response()->json(['msg'=>'Successfully updated status','status'=>'true']);
    }

    public static function getChildByParentID(Request $request, $id){
        
        // dd($id);
        $category = Category::find($request->id);
        
        if ($category) {
            $child_id = Category::getChildByParentID($request->id);
            if(count($child_id)<=0){
                return response()->json(['status'=>false,'data'=>null,'msg'=>'']);
                
            }
            return response()->json(['status'=>true,'data'=>$child_id,'msg'=>'']);
        }
        else{
            return response()->json(['status'=>false,'data'=>null,'msg'=>'']);

        }


    }
}
