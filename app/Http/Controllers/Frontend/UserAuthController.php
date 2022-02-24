<?php

namespace App\Http\Controllers\Frontend;

use App\Models\User;
use Illuminate\Support\Arr;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\URL;

class UserAuthController extends Controller
{

    // for log in user 
    public function userAuth()
    {
        Session::put('url.intended',URL::previous());
        return view('frontend.auth.userLogin');
    }
   

    public function loginSubmit(Request $request)
    {
        // dd($request->all());

        $this->validate($request,[
            'email'=>'email|required|exists:users,email',
            'password'=>'required|min:4',
        ]);

        if (Auth::attempt(['email' =>$request->email, 'password'=>$request->password,'status'=>'active'])) {
            
        Session::put('user',$request->email);

            if (Session::get('url.intended')) {
                return Redirect::to(Session::get('url.intended'));
            }
            else
            {
                return redirect()->route('homee')->with('success','Successfully Log in ');


            }
            
        }
        else
        {
            return redirect()->back()->withErrors(['msg', 'You are not able to access']);
        }

    }



    // for register user 
    public function userRegister()
    {
        return view('frontend.auth.userRegister');
    }



    public function registerSubmit(Request $request)
    {
        $this->validate($request,[
            'full_name'=>'string|required',
            // 'username'=>'string|nullable',
            'email'=>'string|required',
            'password'=>'required',
            'phone'=>'string|required',

            'address'=>'string|required',

            'country'=>'string|required',

          
        ]);

        $data=$request->all();

        // $data['password']=Hash::make($request->password); framework automatically uses hash

        $check=$this->create($data);

            Session::put('user', $data['email']);

            Auth::login($check);

            if ($check) {
                return redirect()->route('homee')->with('success',"Succesfully Registerd");
            }
            else
            {
                return back()->with('error',"Please Check Your Crediantials");
            }

    }

    private function create(array $data)
    {
        return User::create([
            'full_name'=>$data['full_name'],
            'email'=>$data['email'],
            'phone'=>$data['phone'],
            'address'=>$data['address'],
            'country'=>$data['country'],
            'password'=>Hash::make($data['password']),

        ]);
    }


    public function userLogout()
    {
        Session::forget('user');
        Auth::logout();
        return redirect('/')->with('success','Logout');
    }
}