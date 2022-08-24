<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Cart;
use App\Models\Coupon;
use Carbon\Carbon;

class CartController extends Controller
{
    function cart_store(Request $request){

        $request->validate([
            'color_id'=>'required',
            'size_id'=>'required',
        ]);

        // if(Cart::where('product_id', $request->product_id)->where('color_id', $request->color_id)->where('size_id', $request->size_id)->exists()){
        //     Cart::where('product_id', $request->product_id)->where('color_id', $request->color_id)->where('size_id', $request->size_id)->increment('quantity', $request->quantity);
        //     return back()->with('cart_added', 'Cart Added Successfully');
        // }
        // else{
        //     Cart::insert([
        //         'customer_id'=>Auth::guard('customerlogin')->id(),
        //         'product_id'=>$request->product_id,
        //         'color_id'=>$request->color_id,
        //         'size_id'=>$request->size_id,
        //         'quantity'=>$request->quantity,
        //         'created_at'=>Carbon::now(),
        //     ]);
        //     return back()->with('cart_added', 'Cart Added Successfully');
        // }
    }

    function cart_remove($cart_id){
        Cart::find($cart_id)->delete();
        return back();
    }

    function cart (Request $request){
        $coupon_code = $request->coupon;
        $message = null;
        $type = null;
        $carts = Cart::where('customer_id', Auth::guard('customerlogin')->id())->get();

        if($coupon_code == ''){
            $discount = 0;
        }
        else{
            if(Coupon::where('coupon_name', $coupon_code)->exists()){
               if(Carbon::now()->format('Y-m-d') > Coupon::where('coupon_name', $coupon_code)->first()->validity){
                $message = 'Coupon Code Expired';
                $discount = 0;
               }
               else{
                $discount = Coupon::where('coupon_name', $coupon_code)->first()->discount;
                $type = Coupon::where('coupon_name', $coupon_code)->first()->type;
               }
            }
            else{
                $message = 'Invalid Coupon Code';
                $discount = 0;
            }
        }
        return view('frontend.cart', [
            'carts'=>$carts,
            'message'=>$message,
            'discount'=>$discount,
            'type'=>$type,
        ]);
    }

    function getCartId(Request $request){
        Cart::find($request->cart_id)->delete();
    }

    function updatecart(Request $request){
        foreach($request->quantity as $cart_id=>$quantity){
            Cart::find($cart_id)->update([
                'quantity'=>$quantity,
            ]);
        }
        return back();
    }
}
