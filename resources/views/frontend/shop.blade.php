@extends('frontend.master')

@section('content')
<!-- product_section - start
================================================== -->
<section class="product_section section_space">
    <h2 class="hidden">Product sidebar</h2>
    <div class="container">
        <div class="row">
            <div class="col-lg-3">
                <aside class="sidebar_section p-0 mt-0">
                    <div class="sb_widget">

                        <div class="filter_sidebar">
                            <div class="fs_widget">
                                <h3 class="fs_widget_title">Filter By Category</h3>
                                <form action="#">
                                    <ul class="fs_brand_list ul_li_block">
                                        @foreach ($categories as $category)
                                        <li>
                                            <div class="checkbox_item">
                                                <input id="apple_brand" class="category_id" value="{{$category->id}}" type="radio" name="brand_checkbox"
                                                    @isset($_GET['category_id'])
                                                        @if ($_GET['category_id'] == $category->id)
                                                            checked
                                                        @endif
                                                    @endisset
                                                >
                                                <label for="apple_brand">{{$category->category_name}}</label>
                                            </div>
                                        </li>
                                        @endforeach
                                    </ul>
                                </form>
                            </div>
                            <div class="fs_widget">
                                <h3 class="fs_widget_title">Filter By Color</h3>
                                <form action="#">
                                    <ul class="fs_brand_list ul_li_block">
                                        @foreach ($colors as $color)
                                        <li>
                                            <div class="checkbox_item">
                                                <input id="apple_brand" class="color_id" value="{{$color->id}}" type="radio" name="brand_checkbox"
                                                @isset($_GET['color_id'])
                                                    @if ($_GET['color_id'] == $color->id)
                                                        checked
                                                    @endif
                                                @endisset
                                                >
                                                <label for="apple_brand">{{$color->color_name}}</label>
                                            </div>
                                        </li>
                                        @endforeach
                                    </ul>
                                </form>
                            </div>
                            <div class="fs_widget">
                                <h3 class="fs_widget_title">Filter By Size</h3>
                                <form action="#">
                                    <ul class="fs_brand_list ul_li_block">
                                        @foreach ($sizes as $size)
                                        <li>
                                            <div class="checkbox_item">
                                                <input id="apple_brand" class="size_id" value="{{$size->id}}" type="radio" name="brand_checkbox"
                                                @isset($_GET['size_id'])
                                                    @if ($_GET['size_id'] == $size->id)
                                                        checked
                                                    @endif
                                                @endisset
                                                >
                                                <label for="apple_brand">{{$size->size_name}}</label>
                                            </div>
                                        </li>
                                        @endforeach
                                    </ul>
                                </form>
                            </div>
                            <div class="fs_widget">
                                <h3 class="fs_widget_title">Filter By Price</h3>
                                <form action="#">
                                    <div class="price-range-slider">
                                        <p class="range-value">
                                          <input type="text" id="amount" readonly>
                                        </p>
                                        <div id="slider-range" class="range-bar"></div>
                                      </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </aside>
            </div>

            <div class="col-lg-9">
                <div class="filter_topbar">
                    <div class="row align-items-center">
                        <div class="col col-md-4">
                            <ul class="layout_btns nav" role="tablist">
                                <li>
                                    <button class="active" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true"><i class="fal fa-bars"></i></button>
                                </li>
                                <li>
                                    <button data-bs-toggle="tab" data-bs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false">
                                        <i class="fal fa-th-large"></i>
                                    </button>
                                </li>
                            </ul>
                        </div>

                        <div class="col col-md-4">
                            <form action="#">
                                <div class="select_option clearfix">
                                    <select id="sort">
                                        <option value="">Select Your Option</option>
                                        <option value="1">Sorting By Name (A-Z)</option>
                                        <option value="2">Sorting By Name (Z-A)</option>
                                        <option value="3">Sorting By Price (Low - High)</option>
                                        <option value="4">Sorting By Price (High - Low)</option>
                                    </select>
                                </div>
                            </form>
                        </div>

                        <div class="col col-md-4">
                            <div class="result_text">Showing 1-12 of 30 relults</div>
                        </div>
                    </div>
                </div>

                <hr />

                <div class="tab-content">
                    <div class="tab-pane fade show active" id="home" role="tabpanel">
                        <div class="shop-product-area shop-product-area-col">
                            <div class="product-area shop-grid-product-area clearfix">
                                @forelse ($all_products as $product)
                                <div class="grid">
                                    <div class="product-pic">
                                        <img src="{{asset('uploads/product/preview')}}/{{$product->preview}}" alt />
                                        <div class="actions">
                                            <ul>
                                                <li>
                                                    <a href="#">
                                                        <svg
                                                            role="img"
                                                            xmlns="http://www.w3.org/2000/svg"
                                                            width="48px"
                                                            height="48px"
                                                            viewBox="0 0 24 24"
                                                            stroke="#2329D6"
                                                            stroke-width="1"
                                                            stroke-linecap="square"
                                                            stroke-linejoin="miter"
                                                            fill="none"
                                                            color="#2329D6"
                                                        >
                                                            <title>Favourite</title>
                                                            <path
                                                                d="M12,21 L10.55,19.7051771 C5.4,15.1242507 2,12.1029973 2,8.39509537 C2,5.37384196 4.42,3 7.5,3 C9.24,3 10.91,3.79455041 12,5.05013624 C13.09,3.79455041 14.76,3 16.5,3 C19.58,3 22,5.37384196 22,8.39509537 C22,12.1029973 18.6,15.1242507 13.45,19.7149864 L12,21 Z"
                                                            />
                                                        </svg>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="#">
                                                        <svg
                                                            role="img"
                                                            xmlns="http://www.w3.org/2000/svg"
                                                            width="48px"
                                                            height="48px"
                                                            viewBox="0 0 24 24"
                                                            stroke="#2329D6"
                                                            stroke-width="1"
                                                            stroke-linecap="square"
                                                            stroke-linejoin="miter"
                                                            fill="none"
                                                            color="#2329D6"
                                                        >
                                                            <title>Shuffle</title>
                                                            <path d="M21 16.0399H17.7707C15.8164 16.0399 13.9845 14.9697 12.8611 13.1716L10.7973 9.86831C9.67384 8.07022 7.84196 7 5.88762 7L3 7" />
                                                            <path d="M21 7H17.7707C15.8164 7 13.9845 8.18388 12.8611 10.1729L10.7973 13.8271C9.67384 15.8161 7.84196 17 5.88762 17L3 17" />
                                                            <path d="M19 4L22 7L19 10" />
                                                            <path d="M19 13L22 16L19 19" />
                                                        </svg>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a class="quickview_btn" data-bs-toggle="modal" href="#quickview_popup" role="button" tabindex="0">
                                                        <svg
                                                            width="48px"
                                                            height="48px"
                                                            viewBox="0 0 24 24"
                                                            xmlns="http://www.w3.org/2000/svg"
                                                            stroke="#2329D6"
                                                            stroke-width="1"
                                                            stroke-linecap="square"
                                                            stroke-linejoin="miter"
                                                            fill="none"
                                                            color="#2329D6"
                                                        >
                                                            <title>Visible (eye)</title>
                                                            <path d="M22 12C22 12 19 18 12 18C5 18 2 12 2 12C2 12 5 6 12 6C19 6 22 12 22 12Z" />
                                                            <circle cx="12" cy="12" r="3" />
                                                        </svg>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="details">
                                        <h4><a href="#">{{$product->product_name}}</a></h4>
                                        <p><a href="#">{{$product->short_desp}}</a></p>
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
                                                    <bdi> {{$product->after_discount}} </bdi>
                                                </span>
                                            </ins>
                                        </span>
                                        <div class="add-cart-area">
                                            <button class="add-to-cart">Add to cart</button>
                                        </div>
                                    </div>
                                </div>
                                @empty
                                <h3>No Search Product Found</h3>
                                @endforelse
                            </div>
                        </div>

                        <div class="pagination_wrap">
                            <ul class="pagination_nav">
                                <li class="active"><a href="#!">01</a></li>
                                <li><a href="#!">02</a></li>
                                <li><a href="#!">03</a></li>
                                <li class="prev_btn">
                                    <a href="#!"><i class="fal fa-angle-left"></i></a>
                                </li>
                                <li class="next_btn">
                                    <a href="#!"><i class="fal fa-angle-right"></i></a>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <div class="tab-pane fade" id="profile" role="tabpanel">
                        <div class="product_layout2_wrap">
                            <div class="product-area-row">
                                <div class="grid clearfix">
                                    <div class="product-pic">
                                        <img src="assets/images/shop/product_img_12.png" alt />
                                        <div class="actions">
                                            <ul>
                                                <li>
                                                    <a href="#">
                                                        <svg
                                                            role="img"
                                                            xmlns="http://www.w3.org/2000/svg"
                                                            width="48px"
                                                            height="48px"
                                                            viewBox="0 0 24 24"
                                                            stroke="#2329D6"
                                                            stroke-width="1"
                                                            stroke-linecap="square"
                                                            stroke-linejoin="miter"
                                                            fill="none"
                                                            color="#2329D6"
                                                        >
                                                            <title>Favourite</title>
                                                            <path
                                                                d="M12,21 L10.55,19.7051771 C5.4,15.1242507 2,12.1029973 2,8.39509537 C2,5.37384196 4.42,3 7.5,3 C9.24,3 10.91,3.79455041 12,5.05013624 C13.09,3.79455041 14.76,3 16.5,3 C19.58,3 22,5.37384196 22,8.39509537 C22,12.1029973 18.6,15.1242507 13.45,19.7149864 L12,21 Z"
                                                            />
                                                        </svg>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="#">
                                                        <svg
                                                            role="img"
                                                            xmlns="http://www.w3.org/2000/svg"
                                                            width="48px"
                                                            height="48px"
                                                            viewBox="0 0 24 24"
                                                            stroke="#2329D6"
                                                            stroke-width="1"
                                                            stroke-linecap="square"
                                                            stroke-linejoin="miter"
                                                            fill="none"
                                                            color="#2329D6"
                                                        >
                                                            <title>Shuffle</title>
                                                            <path d="M21 16.0399H17.7707C15.8164 16.0399 13.9845 14.9697 12.8611 13.1716L10.7973 9.86831C9.67384 8.07022 7.84196 7 5.88762 7L3 7" />
                                                            <path d="M21 7H17.7707C15.8164 7 13.9845 8.18388 12.8611 10.1729L10.7973 13.8271C9.67384 15.8161 7.84196 17 5.88762 17L3 17" />
                                                            <path d="M19 4L22 7L19 10" />
                                                            <path d="M19 13L22 16L19 19" />
                                                        </svg>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a class="quickview_btn" data-bs-toggle="modal" href="#quickview_popup" role="button" tabindex="0">
                                                        <svg
                                                            width="48px"
                                                            height="48px"
                                                            viewBox="0 0 24 24"
                                                            xmlns="http://www.w3.org/2000/svg"
                                                            stroke="#2329D6"
                                                            stroke-width="1"
                                                            stroke-linecap="square"
                                                            stroke-linejoin="miter"
                                                            fill="none"
                                                            color="#2329D6"
                                                        >
                                                            <title>Visible (eye)</title>
                                                            <path d="M22 12C22 12 19 18 12 18C5 18 2 12 2 12C2 12 5 6 12 6C19 6 22 12 22 12Z" />
                                                            <circle cx="12" cy="12" r="3" />
                                                        </svg>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="details">
                                        <h4><a href="#">Macbook Pro</a></h4>
                                        <p><a href="#">Apple MacBook Pro13.3″ Laptop with Touch ID </a></p>
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
                                                    <bdi> <span class="woocommerce-Price-currencySymbol">$</span>471.48 </bdi>
                                                </span>
                                            </ins>
                                        </span>
                                        <div class="add-cart-area">
                                            <button class="add-to-cart">Add to cart</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="grid clearfix">
                                    <div class="product-pic">
                                        <img src="assets/images/shop/product-img-21.png" alt />
                                        <span class="theme-badge">Sale</span>
                                        <div class="actions">
                                            <ul>
                                                <li>
                                                    <a href="#">
                                                        <svg
                                                            role="img"
                                                            xmlns="http://www.w3.org/2000/svg"
                                                            width="48px"
                                                            height="48px"
                                                            viewBox="0 0 24 24"
                                                            stroke="#2329D6"
                                                            stroke-width="1"
                                                            stroke-linecap="square"
                                                            stroke-linejoin="miter"
                                                            fill="none"
                                                            color="#2329D6"
                                                        >
                                                            <title>Favourite</title>
                                                            <path
                                                                d="M12,21 L10.55,19.7051771 C5.4,15.1242507 2,12.1029973 2,8.39509537 C2,5.37384196 4.42,3 7.5,3 C9.24,3 10.91,3.79455041 12,5.05013624 C13.09,3.79455041 14.76,3 16.5,3 C19.58,3 22,5.37384196 22,8.39509537 C22,12.1029973 18.6,15.1242507 13.45,19.7149864 L12,21 Z"
                                                            />
                                                        </svg>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="#">
                                                        <svg
                                                            role="img"
                                                            xmlns="http://www.w3.org/2000/svg"
                                                            width="48px"
                                                            height="48px"
                                                            viewBox="0 0 24 24"
                                                            stroke="#2329D6"
                                                            stroke-width="1"
                                                            stroke-linecap="square"
                                                            stroke-linejoin="miter"
                                                            fill="none"
                                                            color="#2329D6"
                                                        >
                                                            <title>Shuffle</title>
                                                            <path d="M21 16.0399H17.7707C15.8164 16.0399 13.9845 14.9697 12.8611 13.1716L10.7973 9.86831C9.67384 8.07022 7.84196 7 5.88762 7L3 7" />
                                                            <path d="M21 7H17.7707C15.8164 7 13.9845 8.18388 12.8611 10.1729L10.7973 13.8271C9.67384 15.8161 7.84196 17 5.88762 17L3 17" />
                                                            <path d="M19 4L22 7L19 10" />
                                                            <path d="M19 13L22 16L19 19" />
                                                        </svg>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a class="quickview_btn" data-bs-toggle="modal" href="#quickview_popup" role="button" tabindex="0">
                                                        <svg
                                                            width="48px"
                                                            height="48px"
                                                            viewBox="0 0 24 24"
                                                            xmlns="http://www.w3.org/2000/svg"
                                                            stroke="#2329D6"
                                                            stroke-width="1"
                                                            stroke-linecap="square"
                                                            stroke-linejoin="miter"
                                                            fill="none"
                                                            color="#2329D6"
                                                        >
                                                            <title>Visible (eye)</title>
                                                            <path d="M22 12C22 12 19 18 12 18C5 18 2 12 2 12C2 12 5 6 12 6C19 6 22 12 22 12Z" />
                                                            <circle cx="12" cy="12" r="3" />
                                                        </svg>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="details">
                                        <h4><a href="#">Apple Watch</a></h4>
                                        <p><a href="#">Apple Watch Series 7 case Pair any band </a></p>
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
                                                    <bdi> <span class="woocommerce-Price-currencySymbol">$</span>471.48 </bdi>
                                                </span>
                                            </ins>
                                        </span>
                                        <div class="add-cart-area">
                                            <button class="add-to-cart">Add to cart</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="grid clearfix">
                                    <div class="product-pic">
                                        <img src="assets/images/shop/product-img-22.png" alt />
                                        <span class="theme-badge-2">12% off</span>
                                        <div class="actions">
                                            <ul>
                                                <li>
                                                    <a href="#">
                                                        <svg
                                                            role="img"
                                                            xmlns="http://www.w3.org/2000/svg"
                                                            width="48px"
                                                            height="48px"
                                                            viewBox="0 0 24 24"
                                                            stroke="#2329D6"
                                                            stroke-width="1"
                                                            stroke-linecap="square"
                                                            stroke-linejoin="miter"
                                                            fill="none"
                                                            color="#2329D6"
                                                        >
                                                            <title>Favourite</title>
                                                            <path
                                                                d="M12,21 L10.55,19.7051771 C5.4,15.1242507 2,12.1029973 2,8.39509537 C2,5.37384196 4.42,3 7.5,3 C9.24,3 10.91,3.79455041 12,5.05013624 C13.09,3.79455041 14.76,3 16.5,3 C19.58,3 22,5.37384196 22,8.39509537 C22,12.1029973 18.6,15.1242507 13.45,19.7149864 L12,21 Z"
                                                            />
                                                        </svg>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="#">
                                                        <svg
                                                            role="img"
                                                            xmlns="http://www.w3.org/2000/svg"
                                                            width="48px"
                                                            height="48px"
                                                            viewBox="0 0 24 24"
                                                            stroke="#2329D6"
                                                            stroke-width="1"
                                                            stroke-linecap="square"
                                                            stroke-linejoin="miter"
                                                            fill="none"
                                                            color="#2329D6"
                                                        >
                                                            <title>Shuffle</title>
                                                            <path d="M21 16.0399H17.7707C15.8164 16.0399 13.9845 14.9697 12.8611 13.1716L10.7973 9.86831C9.67384 8.07022 7.84196 7 5.88762 7L3 7" />
                                                            <path d="M21 7H17.7707C15.8164 7 13.9845 8.18388 12.8611 10.1729L10.7973 13.8271C9.67384 15.8161 7.84196 17 5.88762 17L3 17" />
                                                            <path d="M19 4L22 7L19 10" />
                                                            <path d="M19 13L22 16L19 19" />
                                                        </svg>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a class="quickview_btn" data-bs-toggle="modal" href="#quickview_popup" role="button" tabindex="0">
                                                        <svg
                                                            width="48px"
                                                            height="48px"
                                                            viewBox="0 0 24 24"
                                                            xmlns="http://www.w3.org/2000/svg"
                                                            stroke="#2329D6"
                                                            stroke-width="1"
                                                            stroke-linecap="square"
                                                            stroke-linejoin="miter"
                                                            fill="none"
                                                            color="#2329D6"
                                                        >
                                                            <title>Visible (eye)</title>
                                                            <path d="M22 12C22 12 19 18 12 18C5 18 2 12 2 12C2 12 5 6 12 6C19 6 22 12 22 12Z" />
                                                            <circle cx="12" cy="12" r="3" />
                                                        </svg>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="details">
                                        <h4><a href="#">Mac Mini</a></h4>
                                        <p><a href="#">Apple MacBook Pro13.3″ Laptop with Touch ID </a></p>
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
                                                    <bdi> <span class="woocommerce-Price-currencySymbol">$</span>471.48 </bdi>
                                                </span>
                                            </ins>
                                            <del aria-hidden="true">
                                                <span class="woocommerce-Price-amount amount">
                                                    <bdi> <span class="woocommerce-Price-currencySymbol">$</span>904.21 </bdi>
                                                </span>
                                            </del>
                                        </span>
                                        <div class="add-cart-area">
                                            <button class="add-to-cart">Add to cart</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="grid clearfix">
                                    <div class="product-pic">
                                        <img src="assets/images/shop/product-img-23.png" alt />
                                        <span class="theme-badge">Sale</span>
                                        <div class="actions">
                                            <ul>
                                                <li>
                                                    <a href="#">
                                                        <svg
                                                            role="img"
                                                            xmlns="http://www.w3.org/2000/svg"
                                                            width="48px"
                                                            height="48px"
                                                            viewBox="0 0 24 24"
                                                            stroke="#2329D6"
                                                            stroke-width="1"
                                                            stroke-linecap="square"
                                                            stroke-linejoin="miter"
                                                            fill="none"
                                                            color="#2329D6"
                                                        >
                                                            <title>Favourite</title>
                                                            <path
                                                                d="M12,21 L10.55,19.7051771 C5.4,15.1242507 2,12.1029973 2,8.39509537 C2,5.37384196 4.42,3 7.5,3 C9.24,3 10.91,3.79455041 12,5.05013624 C13.09,3.79455041 14.76,3 16.5,3 C19.58,3 22,5.37384196 22,8.39509537 C22,12.1029973 18.6,15.1242507 13.45,19.7149864 L12,21 Z"
                                                            />
                                                        </svg>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="#">
                                                        <svg
                                                            role="img"
                                                            xmlns="http://www.w3.org/2000/svg"
                                                            width="48px"
                                                            height="48px"
                                                            viewBox="0 0 24 24"
                                                            stroke="#2329D6"
                                                            stroke-width="1"
                                                            stroke-linecap="square"
                                                            stroke-linejoin="miter"
                                                            fill="none"
                                                            color="#2329D6"
                                                        >
                                                            <title>Shuffle</title>
                                                            <path d="M21 16.0399H17.7707C15.8164 16.0399 13.9845 14.9697 12.8611 13.1716L10.7973 9.86831C9.67384 8.07022 7.84196 7 5.88762 7L3 7" />
                                                            <path d="M21 7H17.7707C15.8164 7 13.9845 8.18388 12.8611 10.1729L10.7973 13.8271C9.67384 15.8161 7.84196 17 5.88762 17L3 17" />
                                                            <path d="M19 4L22 7L19 10" />
                                                            <path d="M19 13L22 16L19 19" />
                                                        </svg>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a class="quickview_btn" data-bs-toggle="modal" href="#quickview_popup" role="button" tabindex="0">
                                                        <svg
                                                            width="48px"
                                                            height="48px"
                                                            viewBox="0 0 24 24"
                                                            xmlns="http://www.w3.org/2000/svg"
                                                            stroke="#2329D6"
                                                            stroke-width="1"
                                                            stroke-linecap="square"
                                                            stroke-linejoin="miter"
                                                            fill="none"
                                                            color="#2329D6"
                                                        >
                                                            <title>Visible (eye)</title>
                                                            <path d="M22 12C22 12 19 18 12 18C5 18 2 12 2 12C2 12 5 6 12 6C19 6 22 12 22 12Z" />
                                                            <circle cx="12" cy="12" r="3" />
                                                        </svg>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="details">
                                        <h4><a href="#">iPad mini</a></h4>
                                        <p><a href="#">The ultimate iPad experience all over the world </a></p>
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
                                                    <bdi> <span class="woocommerce-Price-currencySymbol">$</span>471.48 </bdi>
                                                </span>
                                            </ins>
                                        </span>
                                        <div class="add-cart-area">
                                            <button class="add-to-cart">Add to cart</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="grid clearfix">
                                    <div class="product-pic">
                                        <img src="assets/images/shop/product-img-24.png" alt />
                                        <span class="theme-badge-2">25% off</span>
                                        <div class="actions">
                                            <ul>
                                                <li>
                                                    <a href="#">
                                                        <svg
                                                            role="img"
                                                            xmlns="http://www.w3.org/2000/svg"
                                                            width="48px"
                                                            height="48px"
                                                            viewBox="0 0 24 24"
                                                            stroke="#2329D6"
                                                            stroke-width="1"
                                                            stroke-linecap="square"
                                                            stroke-linejoin="miter"
                                                            fill="none"
                                                            color="#2329D6"
                                                        >
                                                            <title>Favourite</title>
                                                            <path
                                                                d="M12,21 L10.55,19.7051771 C5.4,15.1242507 2,12.1029973 2,8.39509537 C2,5.37384196 4.42,3 7.5,3 C9.24,3 10.91,3.79455041 12,5.05013624 C13.09,3.79455041 14.76,3 16.5,3 C19.58,3 22,5.37384196 22,8.39509537 C22,12.1029973 18.6,15.1242507 13.45,19.7149864 L12,21 Z"
                                                            />
                                                        </svg>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="#">
                                                        <svg
                                                            role="img"
                                                            xmlns="http://www.w3.org/2000/svg"
                                                            width="48px"
                                                            height="48px"
                                                            viewBox="0 0 24 24"
                                                            stroke="#2329D6"
                                                            stroke-width="1"
                                                            stroke-linecap="square"
                                                            stroke-linejoin="miter"
                                                            fill="none"
                                                            color="#2329D6"
                                                        >
                                                            <title>Shuffle</title>
                                                            <path d="M21 16.0399H17.7707C15.8164 16.0399 13.9845 14.9697 12.8611 13.1716L10.7973 9.86831C9.67384 8.07022 7.84196 7 5.88762 7L3 7" />
                                                            <path d="M21 7H17.7707C15.8164 7 13.9845 8.18388 12.8611 10.1729L10.7973 13.8271C9.67384 15.8161 7.84196 17 5.88762 17L3 17" />
                                                            <path d="M19 4L22 7L19 10" />
                                                            <path d="M19 13L22 16L19 19" />
                                                        </svg>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a class="quickview_btn" data-bs-toggle="modal" href="#quickview_popup" role="button" tabindex="0">
                                                        <svg
                                                            width="48px"
                                                            height="48px"
                                                            viewBox="0 0 24 24"
                                                            xmlns="http://www.w3.org/2000/svg"
                                                            stroke="#2329D6"
                                                            stroke-width="1"
                                                            stroke-linecap="square"
                                                            stroke-linejoin="miter"
                                                            fill="none"
                                                            color="#2329D6"
                                                        >
                                                            <title>Visible (eye)</title>
                                                            <path d="M22 12C22 12 19 18 12 18C5 18 2 12 2 12C2 12 5 6 12 6C19 6 22 12 22 12Z" />
                                                            <circle cx="12" cy="12" r="3" />
                                                        </svg>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="details">
                                        <h4><a href="#">Imac 29"</a></h4>
                                        <p><a href="#">Apple iMac 29″ Laptop with Touch ID for you </a></p>
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
                                                    <bdi> <span class="woocommerce-Price-currencySymbol">$</span>471.48 </bdi>
                                                </span>
                                            </ins>
                                            <del aria-hidden="true">
                                                <span class="woocommerce-Price-amount amount">
                                                    <bdi> <span class="woocommerce-Price-currencySymbol">$</span>904.21 </bdi>
                                                </span>
                                            </del>
                                        </span>
                                        <div class="add-cart-area">
                                            <button class="add-to-cart">Add to cart</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="pagination_wrap">
                            <ul class="pagination_nav">
                                <li class="active"><a href="#!">01</a></li>
                                <li><a href="#!">02</a></li>
                                <li><a href="#!">03</a></li>
                                <li class="prev_btn">
                                    <a href="#!"><i class="fal fa-angle-left"></i></a>
                                </li>
                                <li class="next_btn">
                                    <a href="#!"><i class="fal fa-angle-right"></i></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- product_section - end
================================================== -->
@endsection

@section('footer_script')
    <script>
        $('#search_btn').click(function (){
            var search_input = $('#search_input').val();
            var category_id = $('input[class="category_id"]:checked').val();
            var color_id = $('input[class="color_id"]:checked').val();
            var size_id = $('input[class="size_id"]:checked').val();
            var sort =  $('#sort :selected').val();
            var amount = $('#amount').val();
            var link = "{{route('shop')}}"+"?q="+search_input+"&category_id="+category_id+"&color_id="+color_id+"&size_id="+size_id+"&amount="+amount+"&sort="+sort;
            window.location.href = link;
        });
        $('.category_id').click(function (){
            var search_input = $('#search_input').val();
            var category_id = $('input[class="category_id"]:checked').val();
            var color_id = $('input[class="color_id"]:checked').val();
            var size_id = $('input[class="size_id"]:checked').val();
            var amount = $('#amount').val();
            var sort =  $('#sort :selected').val();
            var link = "{{route('shop')}}"+"?q="+search_input+"&category_id="+category_id+"&color_id="+color_id+"&size_id="+size_id+"&amount="+amount+"&sort="+sort;
            window.location.href = link;
        });
        $('.color_id').click(function (){
            var search_input = $('#search_input').val();
            var category_id = $('input[class="category_id"]:checked').val();
            var color_id = $('input[class="color_id"]:checked').val();
            var size_id = $('input[class="size_id"]:checked').val();
            var amount = $('#amount').val();
            var sort =  $('#sort :selected').val();
            var link = "{{route('shop')}}"+"?q="+search_input+"&category_id="+category_id+"&color_id="+color_id+"&size_id="+size_id+"&amount="+amount+"&sort="+sort;
            window.location.href = link;
        });
        $('.size_id').click(function (){
            var search_input = $('#search_input').val();
            var category_id = $('input[class="category_id"]:checked').val();
            var color_id = $('input[class="color_id"]:checked').val();
            var size_id = $('input[class="size_id"]:checked').val();
            var amount = $('#amount').val();
            var sort =  $('#sort :selected').val();
            var link = "{{route('shop')}}"+"?q="+search_input+"&category_id="+category_id+"&color_id="+color_id+"&size_id="+size_id+"&amount="+amount+"&sort="+sort;
            window.location.href = link;
        });
        $('#slider-range').bind('mouseleave', function (){
            var search_input = $('#search_input').val();
            var category_id = $('input[class="category_id"]:checked').val();
            var color_id = $('input[class="color_id"]:checked').val();
            var size_id = $('input[class="size_id"]:checked').val();
            var amount = $('#amount').val();
            var sort =  $('#sort :selected').val();
            var link = "{{route('shop')}}"+"?q="+search_input+"&category_id="+category_id+"&color_id="+color_id+"&size_id="+size_id+"&amount="+amount+"&sort="+sort;
            window.location.href = link;
        });
        $('#sort').change(function (){
            var search_input = $('#search_input').val();
            var category_id = $('input[class="category_id"]:checked').val();
            var color_id = $('input[class="color_id"]:checked').val();
            var size_id = $('input[class="size_id"]:checked').val();
            var amount = $('#amount').val();
            var sort =  $('#sort :selected').val();
            var link = "{{route('shop')}}"+"?q="+search_input+"&category_id="+category_id+"&color_id="+color_id+"&size_id="+size_id+"&amount="+amount+"&sort="+sort;
            window.location.href = link;
        });
    </script>
    <script>
        $(function() {
	    $( "#slider-range" ).slider({
        range: true,
        min: 0,
        max: 100000,
        values: [0, 50000],
        slide: function( event, ui ) {
            $( "#amount" ).val(ui.values[ 0 ] + "-" + ui.values[ 1 ] );
        }
        });
        $( "#amount" ).val($( "#slider-range" ).slider( "values", 0 ) +
        "-" + $( "#slider-range" ).slider( "values", 1 ) );
    });
    </script>
@endsection
