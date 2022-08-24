
@extends('frontend.master')
@section('content')



<!-- slider_section - start
================================================== -->
<section class="slider_section">
    <div class="container">
        <div class="row">
            <div class="col-lg-9 offset-lg-3">
                <div class="main_slider" data-slick='{"arrows": false}'>
                    <div class="slider_item set-bg-image" data-background="{{asset('/front/images/slider/slide-2.jpg')}}">
                        <div class="slider_content">
                            <h3 class="small_title" data-animation="fadeInUp2" data-delay=".2s">Clothing</h3>
                            <h4 class="big_title" data-animation="fadeInUp2" data-delay=".4s">Smart blood  <span>Pressure monitor</span></h4>
                            <p data-animation="fadeInUp2" data-delay=".6s">The best gadgets collection 2021</p>
                            <div class="item_price" data-animation="fadeInUp2" data-delay=".6s">
                                <del>$430.00</del>
                                <span class="sale_price">$350.00</span>
                            </div>
                            <a class="btn btn_primary" href="shop_details.html" data-animation="fadeInUp2" data-delay=".8s">Start Buying</a>
                        </div>
                    </div>
                    <div class="slider_item set-bg-image" data-background="{{asset('/front/images/slider/slide-3.jpg')}}">
                        <div class="slider_content">
                            <h3 class="small_title" data-animation="fadeInUp2" data-delay=".2s">Clothing</h3>
                            <h4 class="big_title" data-animation="fadeInUp2" data-delay=".4s">Smart blood  <span>Pressure monitor</span></h4>
                            <p data-animation="fadeInUp2" data-delay=".6s">The best gadgets collection 2021</p>
                            <div class="item_price" data-animation="fadeInUp2" data-delay=".6s">
                                <del>$430.00</del>
                                <span class="sale_price">$350.00</span>
                            </div>
                            <a class="btn btn_primary" href="shop_details.html" data-animation="fadeInUp2" data-delay=".8s">Start Buying</a>
                        </div>
                    </div>
                    <div class="slider_item set-bg-image" data-background="{{asset('/front/images/slider/slide-1.jpg')}}">
                        <div class="slider_content">
                            <h3 class="small_title" data-animation="fadeInUp2" data-delay=".2s">Clothing</h3>
                            <h4 class="big_title" data-animation="fadeInUp2" data-delay=".4s">Smart blood  <span>Pressure monitor</span></h4>
                            <p data-animation="fadeInUp2" data-delay=".6s">The best gadgets collection 2021</p>
                            <div class="item_price" data-animation="fadeInUp2" data-delay=".6s">
                                <del>$430.00</del>
                                <span class="sale_price">$350.00</span>
                            </div>
                            <a class="btn btn_primary" href="shop_details.html" data-animation="fadeInUp2" data-delay=".8s">Start Buying</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- slider_section - end
================================================== -->

<!-- policy_section - start
================================================== -->
<section class="policy_section">
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <div class="policy-wrap">
                    <div class="policy_item">
                        <div class="item_icon">
                            <i class="icon icon-Truck"></i>
                        </div>
                        <div class="item_content">
                            <h3 class="item_title">Free Shipping</h3>
                            <p>
                                Free shipping on all US order
                            </p>
                        </div>
                    </div>

                    <div class="policy_item">
                        <div class="item_icon">
                            <i class="icon icon-Headset"></i>
                        </div>
                        <div class="item_content">
                            <h3 class="item_title">Support 24/ 7</h3>
                            <p>
                                Contact us 24 hours a day
                            </p>
                        </div>
                    </div>

                    <div class="policy_item">
                        <div class="item_icon">
                            <i class="icon icon-Wallet"></i>
                        </div>
                        <div class="item_content">
                            <h3 class="item_title">100% Money Back</h3>
                            <p>
                                You have 30 days to Return
                            </p>
                        </div>
                    </div>

                    <div class="policy_item">
                        <div class="item_icon">
                            <i class="icon icon-Starship"></i>
                        </div>
                        <div class="item_content">
                            <h3 class="item_title">90 Days Return</h3>
                            <p>
                                If goods have problems
                            </p>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

</section>
<!-- policy_section - end
================================================== -->


<!-- products-with-sidebar-section - start
================================================== -->
<section class="products-with-sidebar-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-9 order-lg-3">
                <div class="best-selling-products">
                    <div class="sec-title-link">
                        <h3>Latest Product</h3>
                        <div class="view-all"><a href="#">View all<i class="fal fa-long-arrow-right"></i></a></div>
                    </div>
                    <div class="product-area row clearfix">
                        @foreach ($products as $product)
                        <div class="grid col-lg-4 my-3">
                            <div class="product-pic">
                                <img src="{{asset('/uploads/product/preview')}}/{{$product->preview}}" alt>
                                @if ($product->discount)
                                    <span class="theme-badge-2">{{$product->discount}}% off</span>
                                @endif
                                <div class="actions">
                                    <ul>
                                        <li>
                                            <a href="#"><svg role="img" xmlns="http://www.w3.org/2000/svg" width="48px" height="48px" viewBox="0 0 24 24"  stroke="#2329D6" stroke-width="1" stroke-linecap="square" stroke-linejoin="miter" fill="none" color="#2329D6"> <title>Favourite</title> <path d="M12,21 L10.55,19.7051771 C5.4,15.1242507 2,12.1029973 2,8.39509537 C2,5.37384196 4.42,3 7.5,3 C9.24,3 10.91,3.79455041 12,5.05013624 C13.09,3.79455041 14.76,3 16.5,3 C19.58,3 22,5.37384196 22,8.39509537 C22,12.1029973 18.6,15.1242507 13.45,19.7149864 L12,21 Z"/> </svg></a>
                                        </li>
                                        <li>
                                            <a href="#"><svg role="img" xmlns="http://www.w3.org/2000/svg" width="48px" height="48px" viewBox="0 0 24 24"  stroke="#2329D6" stroke-width="1" stroke-linecap="square" stroke-linejoin="miter" fill="none" color="#2329D6"> <title>Shuffle</title> <path d="M21 16.0399H17.7707C15.8164 16.0399 13.9845 14.9697 12.8611 13.1716L10.7973 9.86831C9.67384 8.07022 7.84196 7 5.88762 7L3 7"/> <path d="M21 7H17.7707C15.8164 7 13.9845 8.18388 12.8611 10.1729L10.7973 13.8271C9.67384 15.8161 7.84196 17 5.88762 17L3 17"/> <path d="M19 4L22 7L19 10"/> <path d="M19 13L22 16L19 19"/> </svg></a>
                                        </li>
                                        <li>
                                            <a class="quickview_btn" data-bs-toggle="modal" href="#quickview_popup{{$product->id}}"
                                                data-id ="{{$product->id}}" data-name = "{{$product->product_name}}" data-colorid="{{App\Models\Inventory::where('product_id', $product->id)->groupBy('color_id')->selectRaw('count(*) as total, color_id')->get()}}"
                                            >
                                                <svg width="48px" height="48px" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" stroke="#2329D6" stroke-width="1" stroke-linecap="square" stroke-linejoin="miter" fill="none" color="#2329D6"> <title>Visible (eye)</title> <path d="M22 12C22 12 19 18 12 18C5 18 2 12 2 12C2 12 5 6 12 6C19 6 22 12 22 12Z"/> <circle cx="12" cy="12" r="3"/> </svg>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="details">
                                <h4><a href="{{route('product.details', $product->id)}}">{{$product->product_name}}</a></h4>
                                <p><a href="{{route('product.details', $product->id)}}">{{$product->short_desp}}</a></p>
                                <div class="rating">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star-half-alt"></i>
                                </div>
                                <span class="price">
                                    <ins>
                                        <span class="woocommerce-Price-amount amount">
                                            <bdi>
                                                <span class="woocommerce-Price-currencySymbol">Tk</span>{{$product->after_discount}}
                                            </bdi>
                                        </span>
                                    </ins>
                                </span>
                                <div class="add-cart-area">
                                    <button class="add-to-cart">Add to cart</button>
                                </div>
                            </div>
                        </div>

                        <!-- product quick view modal - start
                        ================================================== -->
                        <div class="modal fade" id="quickview_popup{{$product->id}}">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalToggleLabel2">Product Quick View</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="product_details">
                                            <div class="container">
                                                <div class="row">
                                                    <div class="col col-lg-6">
                                                        <div class="product_details_image p-0">
                                                            <img src="{{asset('/uploads/product/preview')}}/{{$product->preview}}" alt>
                                                        </div>
                                                    </div>

                                                    <div class="col-lg-6">
                                                    <div class="product_details_content">
                                                        <h2 class="item_title">{{$product->product_name}}</h2>
                                                        <p>{{$product->short_desp}}</p>

                                                        @php
                                                            $total_star = App\Models\OrderProduct::where('product_id', $product->id)->whereNotNull('review')->sum('star');
                                                            $total_review = App\Models\OrderProduct::where('product_id', $product->id)->whereNotNull('review')->count();

                                                            if($total_review == 0){
                                                                $avg = 0;
                                                            }
                                                            else{
                                                                $avg = round($total_star / $total_review);
                                                            }

                                                        @endphp

                                                        <div class="item_review">
                                                            <ul class="rating_star ul_li">
                                                                @for($i=1; $i<=$avg; $i++)
                                                                <li><i class="fas fa-star"></i></li>
                                                                @endfor
                                                            </ul>
                                                            <span class="review_value">{{App\Models\OrderProduct::where('product_id', $product->id)->whereNotNull('review')->sum('star');}} Rating(s)</span>
                                                        </div>


                                                        <div class="item_price">
                                                            <span>Tk <span id="price{{$product->id}}">{{$product->after_discount}}</span></span>
                                                            <del>Tk {{$product->product_price}}</del>
                                                        </div>
                                                        <hr>

                                                        <div class="item_attribute">
                                                            <form action="#">
                                                                <div class="row">

                                                                    <div class="col col-md-6">
                                                                        <div class="select_option clearfix">
                                                                            <h4 class="input_title">Color *</h4>
                                                                            <select data-id="{{$product->id}}" class="form-control color_choose" id="color_id" name="color_id">
                                                                                <option value="">Choose A Option</option>
                                                                                @foreach (App\Models\Inventory::where('product_id', $product->id)->groupBy('color_id')->selectRaw('count(*) as total, color_id')->get() as $color)
                                                                                <option value="{{$color->rel_to_color->id}}">{{$color->rel_to_color->color_name}}</option>
                                                                                @endforeach
                                                                            </select>
                                                                        </div>
                                                                    </div>

                                                                    <div class="col col-md-6">
                                                                        <div class="select_option clearfix">
                                                                            <h4 class="input_title">Size *</h4>
                                                                            <select class="form-control" id="size_id{{$product->id}}" name="size_id">
                                                                                <option value="">Choose A Option</option>
                                                                            </select>
                                                                        </div>
                                                                    </div>

                                                                </div>
                                                            </div>

                                                            <div class="quantity_wrap">
                                                                <div class="quantity_input">
                                                                    <button type="button" class="input_number_decrement" data-productid="{{$product->id}}">
                                                                        <i class="fal fa-minus"></i>
                                                                    </button>
                                                                    <input class="input_number{{$product->id}}" type="text" value="1">
                                                                    <button type="button" class="input_number_increment" data-productid="{{$product->id}}">
                                                                        <i class="fal fa-plus"></i>
                                                                    </button>
                                                                </div>
                                                                <div class="total_price">Total: <span id="total{{$product->id}}">{{$product->after_discount}}</span></div>
                                                            </div>

                                                            <ul class="default_btns_group ul_li">
                                                                <li><a class="btn btn_primary addtocart_btn" href="#!">Add To Cart</a></li>
                                                            </ul>
                                                        </div>
                                                    </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- product quick view modal - end
                        ================================================== -->

                        @endforeach

                    </div>
                </div>

                <div class="top_category_wrap">
                    <div class="sec-title-link">
                        <h3>Top categories</h3>
                    </div>
                    <div class="top_category_carousel2" data-slick='{"dots": false}'>
                        @foreach ($categories as $category)
                        <div class="slider_item">
                            <div class="category_boxed">
                                <a href="#!">
                                        <span class="item_image">
                                            <img src="{{asset('/front/images/categories/category_1.png')}}" alt="image_not_found">
                                        </span>
                                    <span class="item_title">{{$category->category_name}}</span>
                                </a>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    <div class="carousel_nav carousel-nav-top-right">
                        <button type="button" class="tc_left_arrow"><i class="fal fa-long-arrow-alt-left"></i></button>
                        <button type="button" class="tc_right_arrow"><i class="fal fa-long-arrow-alt-right"></i></button>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 order-lg-9">
                <div class="product-sidebar">
                    <div class="widget latest_product_carousel">
                        <div class="title_wrap">
                            <h3 class="area_title">Best selling</h3>

                            <div class="carousel_nav">
                                <button type="button" class="vs4i_left_arrow"><i class="fal fa-angle-left"></i></button>
                                <button type="button" class="vs4i_right_arrow"><i class="fal fa-angle-right"></i></button>
                            </div>
                        </div>
                        <div class="vertical_slider_4item" data-slick='{"dots": false}'>
                            @foreach ($best_selling as $best_sell)
                            <div class="slider_item">
                                <div class="small_product_layout">
                                    <a class="item_image" href="shop_details.html">
                                        <img src="{{asset('uploads/product/preview')}}/{{$best_sell->rel_to_product->preview}}" alt="image_not_found">
                                    </a>
                                    <div class="item_content">
                                        <h3 class="item_title">
                                            <a href="shop_details.html">{{$best_sell->rel_to_product->product_name}}</a>
                                        </h3>
                                        <ul class="rating_star ul_li">
                                            <li>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star-half-alt"></i>
                                            </li>
                                        </ul>
                                        <div class="item_price">
                                            <span>{{$best_sell->rel_to_product->after_discount}}</span>
                                            <del>{{$best_sell->rel_to_product->product_price}}</del>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="widget product-add">
                        <div class="product-img">
                            <img src="{{asset('/front/images/shop/product_img_10.png')}}" alt>
                        </div>
                        <div class="details">
                            <h4>iPad pro</h4>
                            <p>iPad pro with M1 chipe</p>
                            <a class="btn btn_primary" href="#" >Start Buying</a>
                        </div>
                    </div>
                    <div class="widget audio-widget">
                        <h5>Audio <span>5</span></h5>
                        <ul>
                            <li><a href="#">MI headphone</a></li>
                            <li><a href="#">Bluetooth AirPods</a></li>
                            <li><a href="#">Music system</a></li>
                            <li><a href="#">JBL bar 5.1</a></li>
                            <li><a href="#">Edifier Computer Speaker</a></li>
                            <li><a href="#">Macbook pro</a></li>
                            <li><a href="#">Men's watch</a></li>
                            <li><a href="#">Washing metchin</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- end container  -->
</section>
<!-- products-with-sidebar-section - end
================================================== -->


<!-- promotion_section - start
================================================== -->
<section class="promotion_section">
    <div class="container">
        <div class="row promotion_banner_wrap">
            <div class="col col-lg-6">
                <div class="promotion_banner">
                    <div class="item_image">
                        <img src="{{asset('/front/images/promotion/banner_img_1.png')}}" alt>
                    </div>
                    <div class="item_content">
                        <h3 class="item_title">Protective sleeves <span>combo.</span></h3>
                        <p>It is a long established fact that a reader will be distracted</p>
                        <a class="btn btn_primary" href="shop_details.html">Shop Now</a>
                    </div>
                </div>
            </div>

            <div class="col col-lg-6">
                <div class="promotion_banner">
                    <div class="item_image">
                        <img src="{{asset('/front/images/promotion/banner_img_2.png')}}" alt>
                    </div>
                    <div class="item_content">
                        <h3 class="item_title">Nutrillet blender <span>combo.</span></h3>
                        <p>
                            It is a long established fact that a reader will be distracted
                        </p>
                        <a class="btn btn_primary" href="shop_details.html">Shop Now</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- promotion_section - end
================================================== -->

<!-- new_arrivals_section - start
================================================== -->
<section class="new_arrivals_section section_space">
    <div class="container">
        <div class="sec-title-link">
            <h3>New Arrivals</h3>
        </div>

        <div class="row newarrivals_products">
            <div class="col col-lg-5">
                <div class="deals_product_layout1">
                    <div class="bg_area">
                        <h3 class="item_title">Best <span>Product</span> Deals</h3>
                        <p>
                            Get a 20% Cashback when buying TWS Product From SoundPro Audio Technology.
                        </p>
                        <a class="btn btn_primary" href="shop_details.html">Shop Now</a>
                    </div>
                </div>
            </div>

            <div class="col col-lg-7">
                <div class="new-arrivals-grids clearfix">
                    @foreach ($new_arrival as $new)
                    <div class="grid">
                        <div class="product-pic">
                            <img src="{{asset('/uploads/product/preview')}}/{{$new->preview}}" alt>
                            <div class="actions">
                                <ul>
                                    <li>
                                        <a href="#"><svg role="img" xmlns="http://www.w3.org/2000/svg" width="48px" height="48px" viewBox="0 0 24 24" stroke="#2329D6" stroke-width="1" stroke-linecap="square" stroke-linejoin="miter" fill="none" color="#2329D6"> <title>Favourite</title> <path d="M12,21 L10.55,19.7051771 C5.4,15.1242507 2,12.1029973 2,8.39509537 C2,5.37384196 4.42,3 7.5,3 C9.24,3 10.91,3.79455041 12,5.05013624 C13.09,3.79455041 14.76,3 16.5,3 C19.58,3 22,5.37384196 22,8.39509537 C22,12.1029973 18.6,15.1242507 13.45,19.7149864 L12,21 Z"/> </svg></a>
                                    </li>
                                    <li>
                                        <a href="#"><svg role="img" xmlns="http://www.w3.org/2000/svg" width="48px" height="48px" viewBox="0 0 24 24" stroke="#2329D6" stroke-width="1" stroke-linecap="square" stroke-linejoin="miter" fill="none" color="#2329D6"> <title>Shuffle</title> <path d="M21 16.0399H17.7707C15.8164 16.0399 13.9845 14.9697 12.8611 13.1716L10.7973 9.86831C9.67384 8.07022 7.84196 7 5.88762 7L3 7"/> <path d="M21 7H17.7707C15.8164 7 13.9845 8.18388 12.8611 10.1729L10.7973 13.8271C9.67384 15.8161 7.84196 17 5.88762 17L3 17"/> <path d="M19 4L22 7L19 10"/> <path d="M19 13L22 16L19 19"/> </svg></a>
                                    </li>
                                    <li>
                                        <a class="quickview_btn" data-bs-toggle="modal" href="#new{{$new->id}}" href="#"><svg width="48px" height="48px" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" stroke="#2329D6" stroke-width="1" stroke-linecap="square" stroke-linejoin="miter" fill="none" color="#2329D6"> <title>Visible (eye)</title> <path d="M22 12C22 12 19 18 12 18C5 18 2 12 2 12C2 12 5 6 12 6C19 6 22 12 22 12Z"/> <circle cx="12" cy="12" r="3"/> </svg></a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="details">
                            <h4><a href="#">{{$new->product_name}}</a></h4>
                            <p><a href="#">{{$new->short_desp}}</a></p>
                            <span class="price">
                                <ins>
                                    <span class="woocommerce-Price-amount amount">
                                        <bdi>
                                            <span class="woocommerce-Price-currencySymbol">Tk</span>{{$new->after_discount}}
                                        </bdi>
                                    </span>
                                </ins>
                            </span>
                            <div class="add-cart-area">
                                <button class="add-to-cart">Add to cart</button>
                            </div>
                        </div>
                    </div>


                    <!-- product quick view modal - start
                        ================================================== -->
                        <div class="modal fade" id="new{{$new->id}}" aria-hidden="true" aria-labelledby="exampleModalToggleLabel2" tabindex="-1">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalToggleLabel2">Product Quick View</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="product_details">
                                            <div class="container">
                                                <div class="row">
                                                    <div class="col col-lg-6">
                                                        <div class="product_details_image p-0">
                                                            <img src="{{asset('/uploads/product/preview')}}/{{$new->preview}}" alt>
                                                        </div>
                                                    </div>

                                                    <div class="col-lg-6">
                                                    <div class="product_details_content">
                                                        <h2 class="item_title">{{$new->product_name}}</h2>
                                                        <p>{{$new->short_desp}}</p>
                                                        <div class="item_review">
                                                            <ul class="rating_star ul_li">
                                                                <li><i class="fas fa-star"></i>></li>
                                                                <li><i class="fas fa-star"></i></li>
                                                                <li><i class="fas fa-star"></i></li>
                                                                <li><i class="fas fa-star"></i></li>
                                                                <li><i class="fas fa-star-half-alt"></i></li>
                                                            </ul>
                                                            <span class="review_value">3 Rating(s)</span>
                                                        </div>

                                                        <div class="item_price">
                                                            <span>Tk {{$new->after_discount}}</span>
                                                            <del>Tk {{$new->product_price}}</del>
                                                        </div>
                                                        <hr>

                                                        <div class="item_attribute px-3">
                                                            <form action="#">
                                                                <div class="row">
                                                                    <div class="col col-md-6">
                                                                        <div class="select_option clearfix">
                                                                            <h4 class="input_title">Color *</h4>
                                                                            <select data-id="{{$new->id}}" class="form-control color_chooses" id="color_id" name="color_id">
                                                                                <option value="">Choose A Option</option>
                                                                                @foreach (App\Models\Inventory::where('product_id', $new->id)->groupBy('color_id')->selectRaw('count(*) as total, color_id')->get() as $color)
                                                                                <option value="{{$color->rel_to_color->id}}">{{$color->rel_to_color->color_name}}</option>
                                                                                @endforeach
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col col-md-6">
                                                                        <div class="select_option clearfix">
                                                                            <h4 class="input_title">Size *</h4>
                                                                            <select id="size_ids{{$new->id}}">
                                                                                <option value="">Choose A Option</option>
                                                                            </select>
                                                                        </div>
                                                                    </div>

                                                                </div>
                                                            </div>

                                                            <div class="quantity_wrap">
                                                                <div class="quantity_input">
                                                                    <button type="button" class="input_number_decrement">
                                                                        <i class="fal fa-minus"></i>
                                                                    </button>
                                                                    <input class="input_number" type="text" value="1">
                                                                    <button type="button" class="input_number_increment">
                                                                        <i class="fal fa-plus"></i>
                                                                    </button>
                                                                </div>
                                                                <div class="total_price">Total: $620,99</div>
                                                            </div>

                                                            <ul class="default_btns_group ul_li">
                                                                <li><a class="btn btn_primary addtocart_btn" href="#!">Add To Cart</a></li>
                                                            </ul>
                                                        </div>
                                                    </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- product quick view modal - end
                        ================================================== -->
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>
<!-- new_arrivals_section - end
================================================== -->

<!-- brand_section - start
================================================== -->
<div class="brand_section pb-0">
    <div class="container">
        <div class="brand_carousel">
            <div class="slider_item">
                <a class="product_brand_logo" href="#!">
                    <img src="{{asset('/front/images/brand/brand_1.png')}}" alt="image_not_found">
                    <img src="{{asset('/front/images/brand/brand_1.png')}}" alt="image_not_found">
                </a>
            </div>
            <div class="slider_item">
                <a class="product_brand_logo" href="#!">
                    <img src="{{asset('/front/images/brand/brand_2.png')}}" alt="image_not_found">
                    <img src="{{asset('/front/images/brand/brand_2.png')}}" alt="image_not_found">
                </a>
            </div>
            <div class="slider_item">
                <a class="product_brand_logo" href="#!">
                    <img src="{{asset('/front/images/brand/brand_3.png')}}" alt="image_not_found">
                    <img src="{{asset('/front/images/brand/brand_3.png')}}" alt="image_not_found">
                </a>
            </div>
            <div class="slider_item">
                <a class="product_brand_logo" href="#!">
                    <img src="{{asset('/front/images/brand/brand_4.png')}}" alt="image_not_found">
                    <img src="{{asset('/front/images/brand/brand_4.png')}}" alt="image_not_found">
                </a>
            </div>
            <div class="slider_item">
                <a class="product_brand_logo" href="#!">
                    <img src="{{asset('/front/images/brand/brand_5.png')}}" alt="image_not_found">
                    <img src="{{asset('/front/images/brand/brand_5.png')}}" alt="image_not_found">
                </a>
            </div>
        </div>
    </div>
</div>
<!-- brand_section - end
================================================== -->

<!-- viewed_products_section - start
================================================== -->
<section class="viewed_products_section section_space">
    <div class="container">
        <div class="sec-title-link mb-0">
            <h3>Recently Viewed Products</h3>
        </div>

        <div class="viewed_products_wrap arrows_topright">
            <div class="viewed_products_carousel row" data-slick='{"dots": false}'>
                <@foreach ($all_recent_product as $recent_viewd)
                <div class="slider_item col">
                    <div class="viewed_product_item">
                        <div class="item_image">
                            <img src="{{asset('/uploads/product/preview')}}/{{$recent_viewd->preview}}" alt="image_not_found">
                        </div>
                        <div class="item_content">
                            <h3 class="item_title">{{$recent_viewd->product_name}}</h3>
                            <ul class="ul_li_block">
                                <li><a href="#!">Computers</a></li>
                                <li><a href="#!">Laptop</a></li>
                                <li><a href="#!">Macbook</a></li>
                                <li><a href="#!">Accessories</a></li>
                                <li><a href="#!">More...</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            <div class="carousel_nav">
                <button type="button" class="vpc_left_arrow"><i class="fal fa-long-arrow-alt-left"></i></button>
                <button type="button" class="vpc_right_arrow"><i class="fal fa-long-arrow-alt-right"></i></button>
            </div>
        </div>
    </div>
</section>
<!-- viewed_products_section - end
================================================== -->
@endsection
@section('footer_script')
    <script>

        $('.input_number_decrement').click(function(){
            var product_id = $(this).attr('data-productid');
            var quantity = $('.input_number'+product_id).val();
            if(quantity > 1){
                quantity--
            }
            $('.input_number'+product_id).val(quantity);
            var price = $('#price'+product_id).html();
            var total = price*quantity;
            $('#total'+product_id).html(total);

        });
        $('.input_number_increment').click(function(){
            var product_id = $(this).attr('data-productid');
            var quantity = $('.input_number'+product_id).val();
            quantity++
            $('.input_number'+product_id).val(quantity);
            var price = $('#price'+product_id).html();
            var total = price*quantity;
            $('#total'+product_id).html(total);

        });


        // get size
        $('.color_choose').change(function(){
            var color_id = $(this).val();
            var product_id = $(this).attr('data-id');

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                type:'POST',
                url:'/getSize',
                data:{'color_id':color_id, 'product_id':product_id},
                success:function(data){
                    $('#size_id'+product_id).html(data);
                }
            });
        });

        // get size
        $('.color_chooses').change(function(){
            var color_id = $(this).val();
            var product_id = $(this).attr('data-id');

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                type:'POST',
                url:'/getSizes',
                data:{'color_id':color_id, 'product_id':product_id},
                success:function(data){
                    $('#size_ids'+product_id).html(data);
                }
            });
        });
    </script>
@endsection
