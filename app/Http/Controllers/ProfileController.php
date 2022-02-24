<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $profileIndex = Auth::user();

        return view('backend.profile.index', compact('profileIndex'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
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
        //
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
        // return $request->all();
        $hashpassword = Auth::user()->password;
        // return $hashpassword;
        if ($request->old_password == null && $request->new_password == null) {
            User::where('id', $id)->update([
                'full_name' => $request->full_name,
                'username' => $request->username,
                'address' => $request->address,
                'country' => $request->country,
                'phone' => $request->phone,
            ]);
            return back()->with('success', 'Account successfully updated');
        } else {
            if (Hash::check($request->old_password, $hashpassword)) {
                if (!Hash::check($request->new_password, $hashpassword)) {
                    User::where('id', $id)->update([
                        'full_name' => $request->full_name,
                        'username' => $request->username,
                        'address' => $request->address,
                        'country' => $request->country,
                        'phone' => $request->phone,
                        'password' => Hash::make($request->new_password),
                    ]);
                    return back()->with('success', 'Account successfully updated');
                } else {
                    return back()->with('error', 'New and old password can not be same');
                }
            } else {
                return back()->with('error', 'Old password doesnot match');
            }
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
        //
    }
}
