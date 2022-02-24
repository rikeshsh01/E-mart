<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $userIndex=User::all();
        // return($productIndex);
        return view('backend.user.index',compact('userIndex'));
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.user.create');
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
            'full_name'=>'string|required',
            'username'=>'string|nullable',
            'email'=>'string|required',
            'password'=>'required',
            'address'=>'string|nullable',
            'phone'=>'nullable|numeric',
            'photo'=>'required',
            'role'=>'required',
            'status'=>'nullable',
            'country'=>'nullable'


        ]);
        $createUser= $request->all();

        $createUser['password']=Hash::make($request->password);
      

        $status=User::create($createUser);


        // error or success message
        if($status){
            // return $status;
            return redirect()->route('user.index')->with('success','successfully created user');

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
        $userEdit=User::find($id);
    
        if($userEdit){
            return view('backend.user.edit',compact('userEdit'));
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
        $userUpdate=User::findOrFail($id);
        if($userUpdate){
            $this->validate($request,[
                'full_name'=>'string|required',
                'username'=>'string|nullable',
                'email'=>'string|required',
                'password'=>'required',
                'address'=>'string|nullable',
                'phone'=>'nullable|numeric',
                'photo'=>'required',
                'role'=>'required',
                'status'=>'nullable',
            'country'=>'nullable'

    
            ]);
    
            $userUpdateData= $request->all();
            $userUpdateData['password']=Hash::make($request->password);
         
            $status=$userUpdate->fill($userUpdateData)->save();
    
    
            // error or success message
            if($status){
    
                return redirect()->route('user.index')->with('success','successfully updated user');
    
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
        $userDelete=User::find($id);

        if($userDelete){

            $status= $userDelete->delete();

            if($status){

                return redirect()->route('user.index')->with('success','User successfully deleted');

            }
            else{
                return back()->with('error','Data not found');
            }
        }
    }

    public function userStatus(Request $request){
        if($request->mode=='true'){
            DB::table('users')->where('id',$request->id)->update(['status'=>'active']);
        }
        else
        {
            DB::table('users')->where('id',$request->id)->update(['status'=>'inactive']);
        }
        return response()->json(['msg'=>'Successfully updated status','status'=>'true']);
    }
}
