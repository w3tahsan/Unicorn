<?php

namespace App\Http\Controllers;

use App\Models\CustomerEmailVerify;
use App\Models\CustomerLogin;
use App\Models\CustomerPasswordReset;
use App\Models\Order;
use App\Notifications\PassResetNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PDF;
use Carbon\Carbon;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Hash;

class CustomerController extends Controller
{
    function customer_account(){
        $orders = Order::where('user_id', Auth::guard('customerlogin')->id())->get();
        return view('frontend.account', [
            'orders'=>$orders,
        ]);
    }
    function customer_account_update(Request $request){
        if($request->password == ''){
            CustomerLogin::find(Auth::guard('customerlogin')->id())->update([
                'name'=>$request->name,
                'email'=>$request->email,
            ]);
            return back();
        }
        else{
            CustomerLogin::find(Auth::guard('customerlogin')->id())->update([
                'name'=>$request->name,
                'email'=>$request->email,
                'password'=>bcrypt($request->password),
            ]);
            return back();
        }
    }

    function download_invoice($order_id){
        $pdf = PDF::loadView('invoice.invoice', [
            'order_id'=>$order_id,
        ]);
        return $pdf->stream('invoice.pdf');
    }


    function password_reset_req(){
        return view('customer_password_reset_req');
    }
    function password_reset_store(Request $request){
       $customer = CustomerLogin::where('email', $request->email)->firstOrFail();
       $password_reset = CustomerPasswordReset::where('customer_id', $customer->id)->delete();

        $password_reset = CustomerPasswordReset::create([
        'customer_id'=>$customer->id,
        'reset_token'=>uniqid(),
        'created_at'=>Carbon::now(),
       ]);

       Notification::send($customer, new PassResetNotification($password_reset));

       return back()->with('reset_link', 'We hae sent you a password reset link!');
    }
    function password_reset_form($token){
        return view('customer_password_reset_form', [
            'token'=>$token,
        ]);
    }
    function password_reset_update(Request $request){
        $customer_token = CustomerPasswordReset::where('reset_token', $request->reset_token)->firstOrFail();
        $customer = CustomerLogin::findOrFail($customer_token->customer_id);
        $customer->update([
            'password'=>Hash::make($request->password),
        ]);
        $customer_token->delete();

        return back()->with('reset_success', 'Your Password Reset Successfully');
    }

    function email_verify($token){
        $token_check = CustomerEmailVerify::where('token', $token)->firstOrFail();
        $customer = CustomerLogin::findOrFail($token_check->customer_id);

        $customer->update([
            'email_verified_at'=>Carbon::now(),
        ]);

        $token_check->delete();

        return redirect()->route('customer.register')->with('verify', 'Congratulation Your Email Has Been Verified!');
    }
}
