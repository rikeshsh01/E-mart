<?php

namespace App\Http\Controllers\Frontend;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AccountController extends Controller
{
    public function userAccount()
    {
        $user = Auth::user();
        return view('frontend.user.dashboard', compact('user'));
    }

    public function order()
    {

        return view('frontend.user.order');
    }

    public function wishlist()
    {
        return view('frontend.user.wishlist');
    }

    public function myaccount()
    {
        $user = Auth::user();
        return view('frontend.user.myaccount', compact('user'));
    }

    public function updateAccount(Request $request, $id)
    {
        $this->validate($request, [
            'new_password' => 'password|min:4',
            'full_name' => 'required|string',
            'username' => 'nullable|string',
            'address' => 'nullable|string',
            'phone' => 'nullable|string',
            'old_password' => 'password|min:4',

        ]);
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
}
