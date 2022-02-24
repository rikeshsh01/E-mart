<?php

use App\Http\Controllers\Frontend\CartController;
use App\Http\Controllers\Frontend\CheckoutController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Frontend\IndexController;
use App\Http\Controllers\Frontend\DetailController;
use App\Http\Controllers\Frontend\PodCatController;
use App\Http\Controllers\Frontend\UserAuthController;
use App\Http\Controllers\Frontend\WishlistController as FrontendWishlistController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WishlistController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Frontend section 

Route::get('/', [IndexController::class, 'home'])->name('homee');

// product detail 

Route::get('/product-detail/{id}', [DetailController::class, 'detail'])->name('product-detail');

// product category 

Route::get('/product-categories/{id}', [PodCatController::class, 'pod_cat'])->name('product-category');



//User Auth
Route::get('user/logauth', [UserAuthController::class, 'userAuth'])->name('user.auth');
Route::get('user/logout', [UserAuthController::class, 'userLogout'])->name('user.logout');
Route::post('user/login', [UserAuthController::class, 'loginSubmit'])->name('login.submit');

Route::get('user/registerauth', [UserAuthController::class, 'userRegister'])->name('user.register');
Route::post('user/register', [UserAuthController::class, 'registerSubmit'])->name('register.submit');

// cart section
Route::post('cart/store',[CartController::class,'cartStore'])->name('cart.store');
Route::get('cart/list',[CartController::class,'cartList'])->name('cart.list');
Route::post('cart/delete',[CartController::class,'cartDelete'])->name('cart.delete');
Route::post('cart/update',[CartController::class,'cartUpdate'])->name('cart.update');

//coupon section
Route::post('coupon/add',[CartController::class,'couponAdd'])->name('coupon.add');

//checkout section
Route::get('checkout1',[CheckoutController::class,'checkout1'])->middleware('user')->name('cart.checkout1');
Route::post('checkout2',[CheckoutController::class,'checkout1store'])->name('checkout1.store');
Route::post('checkout3',[CheckoutController::class,'checkout2store'])->name('checkout2.store');
Route::post('checkout4',[CheckoutController::class,'checkout3store'])->name('checkout3.store');



//wishlist section
Route::get('wishlist',[App\Http\Controllers\Frontend\WishlistController::class,'wishlist'])->name('wishlist');
Route::post('wishlist/move-to-cart',[App\Http\Controllers\Frontend\WishlistController::class,'moveToCart'])->name('wishlist.move.cart');

Route::post('wishlist/store',[App\Http\Controllers\Frontend\WishlistController::class,'wishlistStore'])->name('wishlist.store');
Route::post('wishlist/delete',[App\Http\Controllers\Frontend\WishlistController::class,'wishlistDelete'])->name('wishlist.delete');



// Frontend section end 



Auth::routes(['register' => false]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');




//admin dashboard

Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'admin']],  function () {

	Route::get('/', [\App\Http\Controllers\AdminController::class, 'admin'])->name('admin');


	// banner section

	Route::resource('banner', 'App\Http\Controllers\BannerController');
	Route::post('banner_status', [App\Http\Controllers\BannerController::class, 'bannerStatus'])->name('banner.status');

	//category section
	Route::resource('category', 'App\Http\Controllers\CategoryController');
	Route::post('category_status', [App\Http\Controllers\CategoryController::class, 'categoryStatus'])->name('category.status');

	Route::post('category/{id}/child', [App\Http\Controllers\CategoryController::class, 'getChildByParentID']);

	//Brand section
	Route::resource('brand', 'App\Http\Controllers\BrandController');
	Route::post('brand_status', [\App\Http\Controllers\BrandController::class, 'brandStatus'])->name('brand.status');

	//product section
	Route::resource('product', 'App\Http\Controllers\ProductController');
	Route::post('product_status', [\App\Http\Controllers\ProductController::class, 'productStatus'])->name('product.status');

	//user section
	Route::resource('user', 'App\Http\Controllers\UserController');
	Route::post('user_status', [\App\Http\Controllers\UserController::class, 'userStatus'])->name('user.status');

	// profile 
	Route::get('profile', [ProfileController::class, 'index'])->name('profile.index');
	Route::post('profile/{id}', [ProfileController::class, 'update'])->name('profile.update');

	//Coupon section
	Route::resource('coupon', 'App\Http\Controllers\CouponController');
	Route::post('coupon_status', [\App\Http\Controllers\CouponController::class, 'couponStatus'])->name('coupon.status');

	//shipping management
	Route::resource('shipping', 'App\Http\Controllers\ShippingController');
	Route::post('shipping_status', [\App\Http\Controllers\ShippingController::class, 'shippingStatus'])->name('shipping.status');
});



// Seller 
Route::group(['prefix' => 'seller', 'middleware' => ['auth', 'seller']],  function () {

	Route::get('/', [\App\Http\Controllers\AdminController::class, 'admin'])->name('seller');
});

//user dashboard
Route::group(['prefix' => 'user'],  function () {

	Route::get('/dashboard', [\App\Http\Controllers\Frontend\AccountController::class, 'userAccount'])->name('user.account');
	Route::get('/order', [\App\Http\Controllers\Frontend\AccountController::class, 'order'])->name('user.order');
	Route::get('/wishlist', [\App\Http\Controllers\Frontend\AccountController::class, 'wishlist'])->name('user.wishlist');
	Route::get('/myaccount', [\App\Http\Controllers\Frontend\AccountController::class, 'myaccount'])->name('user.myaccount');

	Route::post('updateAccount/{id}', [\App\Http\Controllers\Frontend\AccountController::class, 'updateAccount'])->name('user.updateMyaccount');
});
