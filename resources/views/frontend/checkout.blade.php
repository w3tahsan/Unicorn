@extends('frontend.master')

@section('content')
 <!-- breadcrumb_section - start
================================================== -->
<div class="breadcrumb_section">
    <div class="container">
        <ul class="breadcrumb_nav ul_li">
            <li><a href="index.html">Home</a></li>
            <li>Checkout</li>
        </ul>
    </div>
</div>
<!-- breadcrumb_section - end

<!-checkout-section - start ================================================== -->
    <section class="checkout-section section_space">
    <div class="container">
        <div class="row">
            <div class="col col-xs-12">
                <div class="woocommerce bg-light p-3">
                <form name="checkout" method="post" class="checkout woocommerce-checkout" action="{{route('checkout.insert')}}">
                    @csrf
                    <input type="hidden" name="user_id" value="{{Auth::guard('customerlogin')->id()}}">
                    <div class="col2-set" id="customer_details">

                        <div class="coll-1">
                            <div class="woocommerce-billing-fields">
                            <h3>Billing Details</h3>
                            <p class="form-row form-row form-row-first validate-required" id="billing_first_name_field">
                                <label for="billing_first_name" class="">First Name <abbr class="required" title="required">*</abbr></label>
                                <input type="text" class="input-text " name="name" id="name" placeholder="" autocomplete="given-name" value="{{Auth::guard('customerlogin')->user()->name}}" />
                            </p>
                            <p class="form-row form-row form-row-last validate-required validate-email" id="billing_email_field">
                                <label for="billing_email" class="">Email Address <abbr class="required" title="required">*</abbr></label>
                                <input type="email" class="input-text " name="email" id="billing_email" placeholder="" autocomplete="email" value="{{Auth::guard('customerlogin')->user()->email}}" />
                            </p>
                            <div class="clear"></div>
                            <p class="form-row form-row form-row-first" id="billing_company_field">
                                <label for="billing_company" class="">Company Name</label>
                                <input type="text" class="input-text " name="company" id="billing_company" placeholder="" autocomplete="organization" value="" />
                            </p>

                            <p class="form-row form-row form-row-last validate-required validate-phone" id="billing_phone_field">
                                <label for="billing_phone" class="">Phone <abbr class="required" title="required">*</abbr></label>
                                <input type="tel" class="input-text " name="phone" id="billing_phone" placeholder="" autocomplete="tel" value="" />
                            </p>
                            <div class="clear"></div>
                            <p class="form-row form-row form-row-first address-field update_totals_on_change validate-required" id="billing_country_field">
                                <select name="country_id" class="form-control" id="country_id">
                                    <option value="">Select a Country&hellip;</option>
                                    @foreach ($countries as $country)
                                        <option value="{{$country->id}}">{{$country->name}}</option>
                                    @endforeach
                                </select>
                            </p>
                            <p class="form-row form-row form-row-last address-field update_totals_on_change validate-required" id="billing_country_field">

                                <select name="city_id" class="form-control" id="city_id">
                                    <option value="">Select a City&hellip;</option>

                                </select>
                            </p>
                            <p class="form-row form-row form-row-wide address-field validate-required" id="billing_address_1_field">
                                <label for="billing_address_1" class="">Address <abbr class="required" title="required">*</abbr></label>
                                <input type="text" class="input-text " name="address" id="billing_address_1" placeholder="Street address" autocomplete="address-line1" value="" />
                            </p>
                            </div>
                            <p class="form-row form-row notes" id="order_comments_field">
                                <label for="order_comments" class="">Order Notes</label>
                                <textarea name="notes" class="input-text " id="order_comments" placeholder="Notes about your order, e.g. special notes for delivery." rows="2" cols="5"></textarea>
                            </p>
                        </div>
                    </div>
                    <h3 id="order_review_heading">Your order</h3>
                    @php
                        $sub_total = 0;
                        foreach (App\Models\Cart::where('customer_id', Auth::guard('customerlogin')->id())->get() as $cart) {
                            $sub_total += $cart->rel_to_product->after_discount * $cart->quantity;
                        }
                    @endphp
                    <div id="order_review" class="woocommerce-checkout-review-order">
                        <table class="shop_table woocommerce-checkout-review-order-table">
                            <tr class="cart-subtotal">
                                <th>Subtotal</th>
                                <td><span class="woocommerce-Price-amount amount" id="sub_total">{{$sub_total}}</span>
                                </td>
                            </tr>
                            <tr class="cart-subtotal">
                                <th>Discount</th>
                                <td><span class="woocommerce-Price-amount amount" id="discount">{{session('discount_final')}}</span>
                                </td>
                            </tr>
                            <tr class="shipping">
                                <th>Delivery Charge</th>
                                <td data-title="Shipping">
                                    <input type="hidden" value="{{session('discount_final')}}" name="discount">
                                    <input type="hidden" value="{{$sub_total}}" name="sub_total">
                                    <input type="radio" class="delivery_btn" name="charge" value="60"> Dhaka
                                    <br>
                                    <input type="radio" class="delivery_btn" name="charge" value="100"> Outside Dhaka
                                </td>
                            </tr>
                            <tr class="order-total">
                                <th>Total</th>
                                <td><strong><span class="woocommerce-Price-amount amount" id="grand_total">{{$sub_total - session('discount_final')}}</span></strong> </td>
                            </tr>
                        </table>
                        <div id="payment" class="woocommerce-checkout-payment py-3 mt-5">
                            <ul class="wc_payment_methods payment_methods methods">
                            <li class="wc_payment_method payment_method_cheque mb-2">
                                <input id="payment_method_cheque" type="radio" class="input-radio" name="payment_method" value="1" checked='checked' data-order_button_text="" />
                                <!--grop add span for radio button style-->
                                <span class='grop-woo-radio-style'></span>
                                <!--custom change-->
                                <label for="payment_method_cheque">Cash On Delivery</label>
                            </li>
                            <li class="wc_payment_method payment_method_paypal mb-2">
                                <input id="payment_method_ssl" type="radio" class="input-radio" name="payment_method" value="2" data-order_button_text="Proceed to SSL Commerz" />
                                <!--grop add span for radio button style-->
                                <span class='grop-woo-radio-style'></span>
                                <!--custom change-->
                                <label for="payment_method_ssl">SSL Commerz</label>
                            </li>
                            <li class="wc_payment_method payment_method_paypal">
                                <input id="payment_method_stripe" type="radio" class="input-radio" name="payment_method" value="3" data-order_button_text="Proceed to SSL Commerz" />
                                <!--grop add span for radio button style-->
                                <span class='grop-woo-radio-style'></span>
                                <!--custom change-->
                                <label for="payment_method_stripe">Stripe Payment</label>
                            </li>
                            </ul>
                            <div class="form-row place-order">

                            <noscript>
                                Since your browser does not support JavaScript, or it is disabled, please ensure you click the <em>Update Totals</em> button before placing your order. You may be charged more than the amount stated above if you fail to do so.
                                <br/>
                                <input type="submit" class="button alt" name="woocommerce_checkout_update_totals" value="Update totals" />
                            </noscript>
                            <input type="submit" class="button alt"  id="place_order" value="Place order" />
                            </div>
                        </div>
                    </div>
                </form>
                </div>
            </div>
        </div>
    </div>
    </section>
    <!-- checkout-section - end
    ================================================== -->

@endsection

@section('footer_script')
<script>
    $('.delivery_btn').click(function(){
        var charge = $(this).val();
        var sub_total = $('#sub_total').html();
        var discount = $('#discount').html();
        var total = sub_total - discount + (parseInt(charge));
        $('#grand_total').html(total);
    });
</script>
<script>
    $(document).ready(function() {
        $('#country_id').select2();
    });
</script>

<script>
    $('#country_id').change(function(){
        var country_id = $(this).val();

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            url:'/getCity',
            type:'POST',
            data:{'country_id':country_id},
            success:function(data){
               $('#city_id').html(data);
               $('#city_id').select2();
            }
        })

    });
</script>

@endsection
