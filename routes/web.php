<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend;

//=============Frontend
Route::middleware(['auth'])->group(function (){
  Route::get('/',[App\Http\Controllers\Frontend\HomeController::class,'index'])->name('home');
//Route::get('{slug}',[App\Http\Controllers\Frontend\ShopController::class,'index'])->name('shop');
Route::get('product-detail/{slug}',[App\Http\Controllers\Frontend\ProductDetailController::class,'index'])->name('product_detail');
Route::any('add-cart/{id}',[App\Http\Controllers\Frontend\AddCartController::class,'store'])->name('add_cart');
Route::get('cart',[App\Http\Controllers\Frontend\AddCartController::class,'index'])->name('cart');
Route::get('wishlist',[App\Http\Controllers\Frontend\WishlistController::class,'index'])->name('wishlist');
Route::get('add-wishlist/{id}',[App\Http\Controllers\Frontend\WishlistController::class,'store'])->name('add_wishlist');
Route::get('remove-wishlist/{id}',[App\Http\Controllers\Frontend\WishlistController::class,'destroy']);
Route::get('wishlist/to-cart/{id}',[App\Http\Controllers\Frontend\WishlistController::class,'wishlistToCart']);
Route::get('inc/cart/{id}',[App\Http\Controllers\Frontend\AddCartController::class,'inc']);
Route::get('dec/cart/{id}',[App\Http\Controllers\Frontend\AddCartController::class,'dec']);
Route::get('remove/cart/{id}',[App\Http\Controllers\Frontend\AddCartController::class,'remove']);
Route::get('counpon-destroy',[App\Http\Controllers\Frontend\AddCartController::class,'forget_session'])->name('coupons');
Route::get('shop/{slug}',[App\Http\Controllers\Frontend\ShopController::class,'index'])->name('shop');
Route::get('checkout',[App\Http\Controllers\Frontend\CheckoutController::class,'index'])->name('checkout');
Route::post('store/checkout',[App\Http\Controllers\Frontend\CheckoutController::class,'store'])->name('store_checkout');
Route::get('product-page',[App\Http\Controllers\Frontend\ProductPageController::class,'index'])->name('product_page');
Route::get('user-profile',[App\Http\Controllers\Frontend\UserProfileController::class,'index'])->name('user_profile');
Route::get('tracking-order',[App\Http\Controllers\Frontend\TrackingController::class,'tracking'])->name('order.tracking');
Route::get('review/{id}',[App\Http\Controllers\Frontend\ReviewController::class,'review'])->name('review');
Route::get('store-review',[App\Http\Controllers\Frontend\ReviewController::class,'store']);
Route::get('payment', [App\Http\Controllers\Frontend\SslCommerzPaymentController::class, 'index']);
Route::get('thank-you', [App\Http\Controllers\Frontend\ThankyouController::class, 'index'])->name('thank');

});

// SSLCOMMERZ Start

Route::post('/success', [App\Http\Controllers\Frontend\SslCommerzPaymentController::class, 'success'])->name('sslc.success');
Route::post('/fail', [App\Http\Controllers\Frontend\SslCommerzPaymentController::class, 'fail'])->name('sslc.failure');
Route::post('/cancel', [App\Http\Controllers\Frontend\SslCommerzPaymentController::class, 'cancel'])->name('sslc.cancel');
Route::post('/ipn', [App\Http\Controllers\Frontend\SslCommerzPaymentController::class, 'ipn'])->name('sslc.ipn');
//SSLCOMMERZ END

//razorpay
Route::post('razorpay',[App\Http\Controllers\Frontend\RazorpayController::class,'razorpay']);
Route::post('success-razorpay',[App\Http\Controllers\Frontend\RazorpayController::class,'success']);

//aamrpay
Route::get('/aamrpay',[App\Http\Controllers\Frontend\AamrpayController::class,'payment']);
Route::post('/aamrpay-success',[App\Http\Controllers\Frontend\AamrpayController::class,'success'])->name('aamrpay-success');
Route::post('/aamrpay-fail',[App\Http\Controllers\Frontend\AamrpayController::class,'fail'])->name('aamrpay-fail');



//============Backend=======
Route::group(['prefix'=>'admin/','middleware'=>'admin'],function(){
  Route::get('dashboard',[Backend\DashboardController::class,'index'])->name('admin_dashboard');
  Route::get('product',[Backend\ProductController::class,'index'])->name('product');
  Route::resource('add-products',Backend\AddProductController::class);
  Route::resource('variants',Backend\VariantController::class);
  Route::resource('add-variants',Backend\AddVariantController::class);
  Route::resource('flash-sales',Backend\FlashSaleController::class);
  Route::resource('categorys',Backend\CategoryController::class);
  Route::resource('subcategorys',Backend\SubcategoryController::class);
  Route::resource('subcategory-childs',Backend\SubcategoryChildController::class);
  Route::resource('brands',Backend\BrandController::class);
  Route::get('coupon',[Backend\CouponController::class,'index'])->name('coupon');
  Route::resource('colors',Backend\ColorController::class);
  Route::resource('sizes',Backend\SizeController::class);
  Route::resource('/header-banners',Backend\HeaderBannerController::class);
  Route::resource('/footer-banners',Backend\FooterBannerController::class);
  Route::get('category-banner',[Backend\CategoryBannerController::class,'index'])->name('category_banner');
  Route::post('store/footer-banner',[Backend\FooterBannerController::class,'store'])->name('store_footer_banner');
  Route::post('store/category-banner',[Backend\CategoryBannerController::class,'store'])->name('store_category_banner');
  Route::get('get-subcategory',[Backend\AjaxController::class,'get'])->name('get-subcategory');
  
  Route::get('/sliders',[Backend\SliderController::class,'index'])->name('slider.index');
  Route::post('store/sliders',[Backend\SliderController::class,'store'])->name('slider.store');
  Route::post('update/sliders/{id}',[Backend\SliderController::class,'update'])->name('slider.update');
  Route::post('delete/sliders/{id}',[Backend\SliderController::class,'destroy'])->name('slider.destroy');
  
  Route::get('services',[Backend\ServiceController::class,'index'])->name('services_index');
  Route::post('store/services',[App\Http\Controllers\Backend\ServiceController::class,'store'])->name('services_store');
  Route::get('setting',[Backend\SettingController::class,'index'])->name('setting.index');
  Route::post('store/setting',[Backend\SettingController::class,'store'])->name('setting.store');
  
  Route::post('option',[Backend\OptionController::class,'store'])->name('store_option');
  Route::get('order',[Backend\OrderController::class,'index'])->name('order.index');
  Route::get('view-order/{id}',[Backend\ViewOrderController::class,'index'])->name('view.order');
  Route::get('order-pdf/{id}',[Backend\ViewOrderController::class,'pdf'])->name('pdf.order');
  Route::get('change-status',[Backend\ViewOrderController::class,'status']);

  Route::get('attribute',[Backend\AttributeController::class,'index'])->name('attribute');
  Route::post('store/attribute',[Backend\AttributeController::class,'store'])->name('store_attribute');
  Route::get('attribute-set',[Backend\AttributeSetController::class,'index'])->name('attribute_set');
  Route::post('store/attribute-set',[Backend\AttributeSetController::class,'store'])->name('store_attribute_set');
  
  
});





Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';



route::fallback(function(){
  return "not found";
});