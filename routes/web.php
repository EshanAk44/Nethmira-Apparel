<?php

use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\ColorController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\SubCategoryController;
use App\Http\Controllers\Admin\DiscountCodeController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\PageController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\Admin\ShippingChargeController;
use App\Http\Controllers\ProductController as ProductFront;
use App\Http\Controllers\UserController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::get('admin', [AuthController::class, 'login_admin']);
Route::post('admin', [AuthController::class, 'auth_login_admin']);
Route::get('admin/logout', [AuthController::class, 'logout_admin']);

Route::group(['middleware' => 'user'], function () {
    Route::get('user/dashboard', [UserController::class, 'dashboard']);
    Route::get('user/orders', [UserController::class,'orders']);

    Route::get('user/edit-profile', [UserController::class,'edit_profile']);
    Route::post('user/edit-profile', [UserController::class,'update_profile']);

    Route::get('user/change-password', [UserController::class,'change_password']);
    Route::post('user/change-password', [UserController::class,'update_password']);
    
    Route::get('user/orders/detail/{id}', [UserController::class,'orders_detail']);

    Route::post('add_to_wishlist', [UserController::class,'add_to_wishlist']);
    Route::get('my-wishlist', [ProductFront::class,'my_wishlist']);
});

Route::group(['middleware' => 'admin'], function () {

    Route::get('admin/dashboard', [DashboardController::class, 'dashboard']);

    //For Admin
    Route::get('admin/admin/list', [AdminController::class, 'list']);
    Route::get('admin/admin/add', [AdminController::class, 'add']);
    Route::post('admin/admin/add', [AdminController::class,'insert']);
    Route::get('admin/admin/edit/{id}', [AdminController::class, 'edit']);
    Route::post('admin/admin/edit/{id}', [AdminController::class,'update']);
    Route::get('admin/admin/delete/{id}', [AdminController::class,'delete']);
    Route::get('admin/customer/list', [AdminController::class,'customer_list']);
    Route::get('admin/customer/delete/{id}', [AdminController::class,'customer_delete']);

    //For Orders
    Route::get('admin/orders/list', [OrderController::class,'list']);
    Route::get('admin/orders/detail/{id}', [OrderController::class,'orders_detail']);
    Route::get('admin/order_status', [OrderController::class,'order_status']);

    //For Category
    Route::get('admin/category/list', [CategoryController::class, 'list']);
    Route::get('admin/category/add', [CategoryController::class, 'add']);
    Route::post('admin/category/add', [CategoryController::class,'insert']);
    Route::get('admin/category/edit/{id}', [CategoryController::class, 'edit']);
    Route::post('admin/category/edit/{id}', [CategoryController::class,'update']);
    Route::get('admin/category/delete/{id}', [CategoryController::class,'delete']);

    //For Sub category
    Route::get('admin/sub_category/list', [SubCategoryController::class, 'list']);
    Route::get('admin/sub_category/add', [SubCategoryController::class, 'add']);
    Route::post('admin/sub_category/add', [SubCategoryController::class,'insert']);
    Route::get('admin/sub_category/edit/{id}', [SubCategoryController::class, 'edit']);
    Route::post('admin/sub_category/edit/{id}', [SubCategoryController::class,'update']);
    Route::get('admin/sub_category/delete/{id}', [SubCategoryController::class,'delete']);
    Route::post('admin/get_sub_category', [SubCategoryController::class,'get_sub_category']);

    //For Brand
    Route::get('admin/brand/list', [BrandController::class, 'list']);
    Route::get('admin/brand/add', [BrandController::class, 'add']);
    Route::post('admin/brand/add', [BrandController::class,'insert']);
    Route::get('admin/brand/edit/{id}', [BrandController::class, 'edit']);
    Route::post('admin/brand/edit/{id}', [BrandController::class,'update']);
    Route::get('admin/brand/delete/{id}', [BrandController::class,'delete']);
    
    //For color
    Route::get('admin/color/list', [ColorController::class, 'list']);
    Route::get('admin/color/add', [ColorController::class, 'add']);
    Route::post('admin/color/add', [ColorController::class,'insert']);
    Route::get('admin/color/edit/{id}', [ColorController::class, 'edit']);
    Route::post('admin/color/edit/{id}', [ColorController::class,'update']);
    Route::get('admin/color/delete/{id}', [ColorController::class,'delete']);

    //For product
    Route::get('admin/product/list', [ProductController::class, 'list']);
    Route::get('admin/product/add', [ProductController::class, 'add']);
    Route::post('admin/product/add', [ProductController::class, 'insert']);
    Route::get('admin/product/edit/{id}', [ProductController::class, 'edit']);
    Route::post('admin/product/edit/{id}', [ProductController::class,'update']);
    Route::get('admin/product/image_delete/{id}', [ProductController::class,'image_delete']);
    Route::post('admin/product_image_sortable', [ProductController::class,'product_image_sortable']);

    //For discount code
    Route::get('admin/discount_code/list', [DiscountCodeController::class, 'list']);
    Route::get('admin/discount_code/add', [DiscountCodeController::class, 'add']);
    Route::post('admin/discount_code/add', [DiscountCodeController::class,'insert']);
    Route::get('admin/discount_code/edit/{id}', [DiscountCodeController::class, 'edit']);
    Route::post('admin/discount_code/edit/{id}', [DiscountCodeController::class,'update']);
    Route::get('admin/discount_code/delete/{id}', [DiscountCodeController::class,'delete']);

    //For shipping charge
    Route::get('admin/shipping_charge/list', [ShippingChargeController::class, 'list']);
    Route::get('admin/shipping_charge/add', [ShippingChargeController::class, 'add']);
    Route::post('admin/shipping_charge/add', [ShippingChargeController::class,'insert']);
    Route::get('admin/shipping_charge/edit/{id}', [ShippingChargeController::class, 'edit']);
    Route::post('admin/shipping_charge/edit/{id}', [ShippingChargeController::class,'update']);
    Route::get('admin/shipping_charge/delete/{id}', [ShippingChargeController::class,'delete']);

    //For pages
    Route::get('admin/page/list', [PageController::class,'list']);
    Route::get('admin/page/edit/{id}', [PageController::class,'edit']);
    Route::post('admin/page/edit/{id}', [PageController::class,'update']);
    Route::get('admin/system-setting', [PageController::class,'system_setting']);
    Route::post('admin/system-setting', [PageController::class,'update_system_setting']);
    
});

//Front End
Route::get('/', [HomeController::class,'home']);
Route::get('contact', [HomeController::class,'contact']);
Route::get('about', [HomeController::class,'about']);
Route::get('faq', [HomeController::class,'faq']);
Route::get('payment-method', [HomeController::class,'payment_method']);
Route::get('returns', [HomeController::class,'returns']);
Route::get('shipping', [HomeController::class,'shipping']);
Route::get('terms-condition', [HomeController::class,'terms_condition']);
Route::get('privacy-policy', [HomeController::class,'privacy_policy']);

//Customer registration
Route::post('auth_register', [AuthController::class,'auth_register']);
Route::get('activate/{id}', [AuthController::class,'activate_email']);
Route::post('auth_login', [AuthController::class,'auth_login']);
Route::get('forgot-password', [AuthController::class,'forgot_password']);
Route::post('forgot-password', [AuthController::class,'auth_forgot_password']);
Route::get('reset/{token}', [AuthController::class,'reset']);
Route::post('reset/{token}', [AuthController::class,'auth_reset']);

//Cart
Route::get('cart', [PaymentController::class,'cart']);
Route::post('product/add-to-cart', [PaymentController::class,'add_to_cart']);
Route::get('cart/delete/{id}', [PaymentController::class,'cart_delete']);
Route::post('update_cart', [PaymentController::class,'update_cart']);

//Checkout
Route::get('checkout', [PaymentController::class,'checkout']);
Route::post('checkout/apply_discount_code', [PaymentController::class,'apply_discount_code']);
Route::post('checkout/place_order', [PaymentController::class,'place_order']);
Route::get('checkout/payment', [PaymentController::class,'checkout_payment']);

Route::get('search', [ProductFront::class,'getProductSearch']);
Route::post('get_filter_product_ajax', [ProductFront::class,'getFilterProductAjax']);
Route::get('{category?}/{subcategory?}', [ProductFront::class,'getCategory']);




