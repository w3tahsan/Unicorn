@extends('frontend.master')

@section('content')

 <!-- breadcrumb_section - start
================================================== -->
<div class="breadcrumb_section">
    <div class="container">
        <ul class="breadcrumb_nav ul_li">
            <li><a href="index.html">Home</a></li>
            <li>Cart</li>
        </ul>
    </div>
</div>
<!-- breadcrumb_section - end
================================================== -->

<!-- cart_section - start
================================================== -->
<section class="cart_section section_space">
    @if (App\Models\Cart::where('customer_id', Auth::guard('customerlogin')->id())->count() > 0)
    <div class="container">
        <div class="cart_table">
            <table class="table">
                <thead>
                    <tr>
                        <th>Product</th>
                        <th class="text-center">Price</th>
                        <th class="text-center">Quantity</th>
                        <th class="text-center">Total</th>
                        <th class="text-center">Stock</th>
                        <th class="text-center">Remove</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $sub_total = 0;
                        $abc = true;
                    @endphp
                    @foreach ($carts as $cart)
                    <tr>
                        <td>
                            <div class="cart_product">
                                <img src="{{asset('/uploads/product/preview/')}}/{{$cart->rel_to_product->preview}}" alt="image_not_found">
                                <h3><a href="shop_details.html">{{$cart->rel_to_product->product_name}}</a></h3>
                            </div>
                        </td>
                        <td class="text-center abc"><span class="price_text">{{$cart->rel_to_product->after_discount}}</span></td>
                        <td class="text-center abc">
                            <form action="{{route('update.cart')}}" method="POST">
                                @csrf
                                <div class="quantity_input">
                                    <button type="button" class="input_number_decrement">
                                        <i data-price={{$cart->rel_to_product->after_discount}} class="fal fa-minus"></i>
                                    </button>
                                    <input class="input_number" name="quantity[{{$cart->id}}]" type="text" value="{{$cart->quantity}}"/>
                                    <button type="button" class="input_number_increment">
                                        <i data-price={{$cart->rel_to_product->after_discount}} class="fal fa-plus"></i>
                                    </button>
                                </div>

                        </td>

                        <td class="text-center abc"><span class="price_text">{{$cart->rel_to_product->after_discount*$cart->quantity}}</span></td>
                        <td>
                          @if (App\Models\Inventory::where('product_id', $cart->product_id)->where('color_id', $cart->color_id)->where('size_id', $cart->size_id)->first()->quantity <= $cart->quantity)
                            <span class="badge bg-warning">Stock Out</span>
                            @php
                                $abc = false;
                            @endphp
                          @else
                            <span class="badge bg-success">Stock in</span>
                          @endif
                        </td>
                        <td class="text-center"><a href="{{route('cart.remove', $cart->id)}}" class="remove_btn"><i class="fal fa-trash-alt"></i></a></td>
                    </tr>
                    @php
                        $sub_total += $cart->rel_to_product->after_discount*$cart->quantity;
                    @endphp
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="cart_btns_wrap">
            <div class="row">
                <div class="col col-lg-6">
                    @php
                        if ($type == 'percentage') {
                            $after_discount_amount = $sub_total - ($sub_total*$discount)/100;
                            if($sub_total >= 1 && $sub_total <= 4999){
                                $discount_final =  $after_discount_amount;
                            }
                            else if ($sub_total >= 5000 && $sub_total <= 9999) {
                                $discount_final = 500;
                            }
                            else if ($sub_total >= 10000 && $sub_total <= 20000) {
                                $discount_final = 1000;
                            }
                            else {
                                $discount_final = 2000;
                            }
                        }
                        else{
                            $discount_final = $discount;
                        }

                    @endphp

                    @php
                        session([
                            'discount_final'=>$discount_final,
                        ])
                    @endphp
                        <ul class="btns_group ul_li_right">
                            <li><button class="btn border_black" type="submit">Update Cart {{$discount_final}}</button></li>
                            @if ($abc == false)
                             <li>
                                <div class="alert alert-warning">Please Remove The Stock Out Product From the Cart</div>
                             </li>
                            @else
                            <li><a class="btn btn_dark" href="{{route('checkout')}}">Prceed To Checkout</a></li>
                            @endif
                        </ul>
                    </form>
                </div>
                <div class="col col-lg-6">
                    @if($message)
                    <div class="alert alert-danger">{{$message}}</div>
                    @endif
                    <form action="{{url('/cart')}}" method="GET">
                        <div class="coupon_form form_item mb-0">
                            <input type="text" name="coupon" placeholder="Coupon Code..." value="{{@$_GET['coupon']}}">
                            <button type="submit" class="btn btn_dark">Apply Coupon</button>
                            <div class="info_icon">
                                <i class="fas fa-info-circle" data-bs-toggle="tooltip" data-bs-placement="top" title="Your Info Here"></i>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col col-lg-12">
                <div class="cart_total_table">
                    <h3 class="wrap_title">Cart Totals</h3>
                    <ul class="ul_li_block">
                        <li>
                            <span>Cart Subtotal</span>
                            <span>{{$sub_total}}</span>
                        </li>
                        <li>
                            <span>Discount</span>
                            <span>{{$discount_final}}</span>
                        </li>
                        <li>
                            <span>Order Total</span>
                            <span class="total_price">
                                {{($sub_total - $discount_final)}}
                            </span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    @else


    <!-- empty_cart_section - start
    ================================================== -->
    <section class="empty_cart_section section_space">
        <div class="container">
            <div class="empty_cart_content text-center">
                <span class="cart_icon">
                    <i class="icon icon-ShoppingCart"></i>
                </span>
                <h3>There are no more items in your cart</h3>
                <a class="btn btn_secondary" href="index.http"><i class="far fa-chevron-left"></i> Continue shopping </a>
            </div>
        </div>
    </section>
    <!-- empty_cart_section - end
    ================================================== -->

    @endif

</section>
<!-- cart_section - end
================================================== -->

@endsection

@section('footer_script')

<script>
    // $('.remove_btn').click(function(){
    //     let cart_id = $(this).attr('data-cartId');

    //     $.ajaxSetup({
    //         headers: {
    //             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    //         }
    //     });

    //     $.ajax({
    //         type:'POST',
    //         url:'/getCartId',
    //         data:{'cart_id':cart_id},
    //         success:function(data){
    //             alert(data);
    //         }
    //     });


    // });
</script>





<script>
    let quantity_input = document.querySelectorAll('.abc');
    let arr = Array.from(quantity_input);

    arr.map(item=>{
        item.addEventListener('click', function(e){
            if(e.target.className == 'fal fa-plus'){
                e.target.parentElement.previousElementSibling.value++
                let quantity = e.target.parentElement.previousElementSibling.value
                let price = e.target.dataset.price;
                item.nextElementSibling.innerHTML = price*quantity
            }
            if(e.target.className == 'fal fa-minus'){
                if(e.target.parentElement.nextElementSibling.value > 1){
                    e.target.parentElement.nextElementSibling.value--
                    let quantity = e.target.parentElement.nextElementSibling.value
                    let price = e.target.dataset.price;
                    item.nextElementSibling.innerHTML = price*quantity
                }
            }
        });
    });


</script>
@endsection
