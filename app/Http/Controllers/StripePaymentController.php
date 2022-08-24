<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use Stripe;
use App\Mail\SendInVoiceMail;
use App\Models\BillingDetails;
use App\Models\Cart;
use App\Models\City;
use App\Models\Country;
use App\Models\Inventory;
use App\Models\Order;
use App\Models\OrderProduct;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Mail;

class StripePaymentController extends Controller
{
    /**
     * success response method.
     *
     * @return \Illuminate\Http\Response
     */
    public function stripe()
    {
        return view('stripe');
    }

    /**
     * success response method.
     *
     * @return \Illuminate\Http\Response
     */
    public function stripePost(Request $request)
    {
        $data = session('data');
        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
        Stripe\Charge::create ([
                "amount" =>100 * $data['sub_total']+$data['charge'] - ($data['discount']),
                "currency" => "bdt",
                "source" => $request->stripeToken,
                "description" => "Test payment from itsolutionstuff.com."
        ]);

            $order_id = Order::insertGetId([
                'user_id'=>$data['user_id'],
                'sub_total'=>$data['sub_total'],
                'discount'=>$data['discount'],
                'delivery_charge'=>$data['charge'],
                'total'=>$data['sub_total']+$data['charge'] - ($data['discount']),
                'created_at'=>Carbon::now(),
            ]);

            BillingDetails::insert([
                'user_id'=>$data['user_id'],
                'order_id'=>$order_id,
                'name'=>$data['name'],
                'email'=>$data['email'],
                'phone'=>$data['phone'],
                'country_id'=>$data['country_id'],
                'city_id'=>$data['city_id'],
                'address'=>$data['address'],
                'company'=>$data['company'],
                'notes'=>$data['notes'],
                'created_at'=>Carbon::now(),
            ]);

            $carts = Cart::where('customer_id', Auth::guard('customerlogin')->id())->get();
            foreach($carts as $cart){
                OrderProduct::insert([
                    'order_id'=>$order_id,
                    'product_id'=>$cart->product_id,
                    'price'=>$cart->rel_to_product->after_discount,
                    'quantity'=>$cart->quantity,
                    'created_at'=>Carbon::now(),
                ]);
            }
            $total_amount = $data['sub_total']+$data['charge'] - ($data['discount']);
            Mail::to($data['email'])->send(new SendInVoiceMail($order_id));

            //POST Method example SMS SEND
            $url = "http://66.45.237.70/api.php";
            $number=$data['phone'];
            $text="Thank You for Purchasing Our Products, your total amount is: ".$total_amount;
            $data= array(
            'username'=>"maruf123",
            'password'=>"5D9GVBKH",
            'number'=>"$number",
            'message'=>"$text"
            );

            $ch = curl_init(); // Initialize cURL
            curl_setopt($ch, CURLOPT_URL,$url);
            curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            $smsresult = curl_exec($ch);
            $p = explode("|",$smsresult);
            $sendstatus = $p[0];

            foreach($carts as $cart){
                Inventory::where('product_id', $cart->product_id)->where('color_id', $cart->color_id)->where('size_id', $cart->size_id)->decrement('quantity', $cart->quantity);
                Cart::find($cart->id)->delete();
            }

            return redirect()->route('order.success')->with('order_success', 'Your Order Has Been Placed!');
    }
}
