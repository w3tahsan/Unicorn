<?php

namespace App\Http\Controllers;

use App\Models\Coupon;
use Carbon\Carbon;
use Illuminate\Http\Request;

class CouponController extends Controller
{
    function coupon(){
        $coupons = Coupon::all();
        return view('admin.coupon.index', [
            'coupons'=>$coupons,
        ]);
    }
    function coupon_insert(Request $request){
        Coupon::insert([
            'coupon_name'=>$request->coupon_name,
            'discount'=>$request->discount,
            'type'=>$request->type,
            'validity'=>$request->validity,
            'created_at'=>Carbon::now(),
        ]);
        return back();
    }
}
