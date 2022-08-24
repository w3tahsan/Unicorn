<?php

namespace App\Http\Controllers;

use App\Models\CustomerEmailVerify;
use App\Models\CustomerLogin;
use App\Notifications\CustomerEmailverifyNotification;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Notification;

class CustomerRegisterController extends Controller
{
    function customer_register(){
        return view('frontend.customer_register');
    }
    function customer_store(Request $request){
        CustomerLogin::insert([
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>bcrypt($request->password),
            'created_at'=>Carbon::now(),
        ]);

        $customer = CustomerLogin::where('email', $request->email)->firstOrFail();
        $delete_info = CustomerEmailVerify::where('customer_id', $customer->id)->delete();

        $verify_info = CustomerEmailVerify::create([
            'customer_id'=>$customer->id,
            'token'=>uniqid(),
            'created_at'=>Carbon::now(),
        ]);

        Notification::send($customer, new CustomerEmailverifyNotification($verify_info));

        return back()->with('email_verify', 'We Have Sent you a Verification Link at ->'.$customer->email);
    }
}
