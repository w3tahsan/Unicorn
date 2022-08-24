<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CustomerLogin;
use Illuminate\Support\Facades\Auth;

class CustomerLoginController extends Controller
{
    function customer_login(Request $request){
        if(Auth::guard('customerlogin')->attempt(['email'=>$request->email, 'password'=>$request->password])){
            if(Auth::guard('customerlogin')->user()->email_verified_at == null){
                Auth::guard('customerlogin')->logout();
                return redirect()->route('customer.register')->with('need_verify', 'Please Verify Your Email!');
            }
            return redirect('/');
        }
        else{
            return redirect()->route('customer.register');
        }
    }

    function customer_logout(){
        Auth::guard('customerlogin')->logout();
        return redirect('/');
    }
}
