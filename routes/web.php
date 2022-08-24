<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\FontendController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\CouponController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\CustomerLoginController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\CustomerRegisterController;
use App\Http\Controllers\FacebookController;
use App\Http\Controllers\GithubController;
use App\Http\Controllers\GoogleController;
use App\Http\Controllers\InventoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\SubcategoryController;
use App\Http\Controllers\SslCommerzPaymentController;
use App\Http\Controllers\StripePaymentController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Auth::routes([
    'login'=>false,
]);
Route::get('/abcd', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('login');

//frontend
Route::get('/', [FontendController::class, 'index'])->name('homepage');
Route::get('/product/details/{product_id}', [FontendController::class, 'product_details'])->name('product.details');
Route::post('/getSize', [FontendController::class, 'getSize']);
Route::post('/getSizes', [FontendController::class, 'getSizes']);
Route::post('/stock', [FontendController::class, 'stock']);
Route::get('/shop', [FontendController::class, 'shop'])->name('shop');




//home
Route::get('/home', [HomeController::class, 'index'])->middleware('Authactive')->name('home');

// Route::get('/dash', [HomeController::class, 'dash']);

Route::get('/user/list', [HomeController::class, 'userList'])->name('user');
Route::get('/user/delete,{user_id}', [HomeController::class, 'userDelete'])->name('user.delete');
// profile change
Route::get('/profile/change', [HomeController::class, 'profileChange'])->name('profile.change');
// profile name change
Route::post('/profile/name/update', [HomeController::class, 'nameChange']);
// profile password update
Route::post('/profile/password/update', [HomeController::class, 'passwordUpdate']);
// profilr picture update
Route::post('/profile/photo/update', [HomeController::class, 'pictureUpdate']);





// category
Route::get('/add/category', [CategoryController::class, 'index'])->name('add.category');
// category insert
Route::post('/category/insert', [CategoryController::class, 'insertCategory']);
// category edit
Route::get('/edit/category/{category_id}', [CategoryController::class, 'edit'])->name('category.edit');
//category update
Route::post('/category/update', [CategoryController::class, 'updateCategory']);
// category soft delete
Route::get('/category/delete,{category_id}', [CategoryController::class, 'categorySoftDelete'])->name('categorySoft.delete');
// mark all delete
Route::post('/markSoft/delete', [CategoryController::class, 'markSoftDelete']);
// category hard delete
Route::get('/category/hard/delete,{category_id}', [CategoryController::class, 'categoryHardDelete'])->name('categoryHard.delete');
// category restore
Route::get('/category/restore/{category_id}', [CategoryController::class, 'restoreCategory'])->name('category.restore');
// category all mark restore
Route::post('/markAll/restore', [CategoryController::class, 'markAllrestore']);



// Sub Category
Route::get('/add/subcategory', [SubcategoryController::class, 'subcategory'])->name('add.subcategory');
Route::post('/subcategory/insert', [SubcategoryController::class, 'insert']);
Route::get('/subcategory/edit/{subcategory_id}', [SubcategoryController::class, 'edit'])->name('edit.subcategory');
Route::post('/subcategory/update', [SubcategoryController::class, 'update']);

//product
Route::get('/add/product', [ProductController::class, 'index'])->name('add.product');
Route::post('/getSubcategory', [ProductController::class, 'getSubcategory']);
Route::post('/product/insert', [ProductController::class, 'insert']);
Route::get('/product/list', [ProductController::class, 'view'])->name('product.list');
Route::get('/product/delete/{product_id}', [ProductController::class, 'delete'])->name('product.delete');
Route::get('/product/edit/{product_id}', [ProductController::class, 'product_edit'])->name('product.edit');
Route::post('/product/update', [ProductController::class, 'product_update']);


//inventories
Route::get('/add/color/size', [InventoryController::class, 'color'])->name('add.color.size');
Route::post('/insert/color', [InventoryController::class, 'insert_color']);
Route::post('/insert/size', [InventoryController::class, 'insert_size']);
Route::get('/inventory/{product_id}', [InventoryController::class, 'inventory'])->name('inventory');
Route::post('/inventory/insert', [InventoryController::class, 'inventory_insert']);


//Customer
Route::get('/customer/register', [CustomerRegisterController::class, 'customer_register'])->name('customer.register');
Route::post('/customer/store', [CustomerRegisterController::class, 'customer_store'])->name('customer.store');
Route::post('/customer/login', [CustomerLoginController::class, 'customer_login'])->name('customer.login');
Route::get('/customer/logout', [CustomerLoginController::class, 'customer_logout'])->name('customer.logout');

Route::get('/customer/account', [CustomerController::class, 'customer_account'])->name('customer.account');
Route::post('/customer/account/update', [CustomerController::class, 'customer_account_update'])->name('customer.update');

//Cart
Route::post('/cart/store', [CartController::class, 'cart_store'])->name('cart.store');
Route::get('/cart/remove/{cart_id}', [CartController::class, 'cart_remove'])->name('cart.remove');
Route::get('/cart', [CartController::class, 'cart'])->name('cart');
Route::post('/getCartId', [CartController::class, 'getCartId']);
Route::post('/update/cart', [CartController::class, 'updatecart'])->name('update.cart');

//coupon
Route::get('/coupon', [CouponController::class, 'coupon'])->name('coupon');
Route::post('/coupon/insert', [CouponController::class, 'coupon_insert'])->name('coupon.insert');


//Checkout
Route::get('/checkout', [CheckoutController::class, 'checkout'])->name('checkout');
Route::post('/getCity', [CheckoutController::class, 'getCity']);
Route::post('/checkout/insert', [CheckoutController::class, 'checkout_insert'])->name('checkout.insert');
Route::get('/order/success', [CheckoutController::class, 'order_success'])->name('order.success');

//invoice
Route::get('/invoice/download/{order_id}', [CustomerController::class, 'download_invoice'])->name('download.invoice');

// SSLCOMMERZ Start
Route::get('/example1', [SslCommerzPaymentController::class, 'exampleEasyCheckout']);
Route::get('/ssl/pay', [SslCommerzPaymentController::class, 'exampleHostedCheckout']);

Route::post('/pay', [SslCommerzPaymentController::class, 'index']);
Route::post('/pay-via-ajax', [SslCommerzPaymentController::class, 'payViaAjax']);

Route::post('/success', [SslCommerzPaymentController::class, 'success']);
Route::post('/fail', [SslCommerzPaymentController::class, 'fail']);
Route::post('/cancel', [SslCommerzPaymentController::class, 'cancel']);

Route::post('/ipn', [SslCommerzPaymentController::class, 'ipn']);
//SSLCOMMERZ END


// Stripe
Route::get('stripe', [StripePaymentController::class, 'stripe']);
Route::post('stripe', [StripePaymentController::class, 'stripePost'])->name('stripe.post');

//Review
Route::post('/review', [FontendController::class, 'review'])->name('product.review');


//Password Reset
Route::get('/customer/password/reset/request', [CustomerController::class, 'password_reset_req'])->name('password.reset.req');
Route::post('/customer/password/reset/store', [CustomerController::class, 'password_reset_store'])->name('password.reset.store');
Route::get('/customer/password/reset/form/{token}', [CustomerController::class, 'password_reset_form'])->name('password.reset.form');
Route::post('/customer/password/reset/update', [CustomerController::class, 'password_reset_update'])->name('password.reset.update');

//Email Verify
Route::get('/customer/email/verify/{token}', [CustomerController::class, 'email_verify']);


//Github Login
Route::get('/github/redirect', [GithubController::class, 'redirectToProvider']);
Route::get('/github/callback', [GithubController::class, 'handleToProviderCallback']);


//Github Login
Route::get('/google/redirect', [GoogleController::class, 'redirectToProvider']);
Route::get('/google/callback', [GoogleController::class, 'handleToProviderCallback']);

//Facebook Login
Route::get('/facebook/redirect', [FacebookController::class, 'redirectToProvider']);
Route::get('/facebook/callback', [FacebookController::class, 'handleToProviderCallback']);

//Role Manager
Route::get('/role/manager', [RoleController::class, 'role_manager'])->name('role.manager');
Route::post('/add/permission', [RoleController::class, 'add_permission'])->name('add.permission');
Route::post('/add/role', [RoleController::class, 'add_role'])->name('add.role');
Route::post('/assign/role', [RoleController::class, 'assign_role'])->name('assign.role');
Route::get('/edit/permision/{user_id}', [RoleController::class, 'edit_permision'])->name('edit.permision');
Route::post('/update/permision', [RoleController::class, 'update_permission'])->name('update.permission');
Route::get('/remove/role/{user_id}', [RoleController::class, 'remove_role'])->name('remove.role');
Route::get('/edit/permission/{role_id}', [RoleController::class, 'edit_permission'])->name('edit.permission');
Route::post('/update/role/permission', [RoleController::class, 'update_role_permission'])->name('update.role.permission');
