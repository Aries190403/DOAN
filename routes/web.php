<?php

use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\CommentController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Controller;

use App\Http\Controllers\LoginController;

use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Admin\MainAdminController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\ProductTypeController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\SlideShowController;
use App\Http\Controllers\Admin\UploadController;
use App\Http\Controllers\Admin\ProductImageController;
use App\Http\Controllers\Admin\CouponController;

use App\Http\Controllers\MainController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\FavoriteController;
use App\Http\Controllers\OderController;
use App\Http\Controllers\OrderUserController;
use App\Http\Controllers\UserController;
use App\Models\Product;

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

// Route::get('/', function () {
//     return view('welcome');
// });



Route::get('/cart/add/{product_id}', [CartController::class, 'addcart'])->name('cart/add');
Route::get('/cart/delete/{product_id}/{quantity}', [CartController::class, 'deletecart'])->name('cart/delete');
Route::get('/cart', [CartController::class, 'showUserCart'])->name('cart');

Route::get('/favorites/add/{productId}', [FavoriteController::class, 'addFavorite'])->name('add.Favorite');
Route::get('/favorites/remove/{productId}', [FavoriteController::class, 'removeFavorite']);
Route::get('/favorites', [FavoriteController::class, 'showFavorites'])->name('favorites');

Route::get('/search', [MainController::class, 'searchprod'])->name('favorites');

Route::get('/checkout', [CartController::class, 'checkoutshow'])->name('checkout');
Route::get('/order', [OderController::class, 'CreateIncvoice'])->name('order');
Route::post('/applycoupon', [CartController::class, 'applyCoupon'])->name('applycoupon');

Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login/store', [LoginController::class, 'store']);

Route::get('/register', [RegisterController::class, 'showregister'])->name('register');
Route::post('/register', [RegisterController::class, 'postregister'])->name('register');

Route::get('/', [MainController::class, 'index'])->name('home');
Route::get('/products/{product}', [MainController::class, 'show'])->name('product-show');
Route::get('product/{id}-{slug}.html', [App\Http\Controllers\ProductController::class, 'index']);

Route::middleware(['auth'])->group(function () {

    Route::prefix('admin')->group(function () {
        Route::get('/', [MainAdminController::class, 'index'])->name('admin');
        // Route::get('main', [MainController::class, 'index']);

        #product type
        Route::prefix('producttypes')->group(function () {
            Route::get('add', [ProductTypeController::class, 'create']);
            Route::post('add', [ProductTypeController::class, 'store']);
            Route::get('list', [ProductTypeController::class, 'list']);
            Route::get('edit/{producttype}', [ProductTypeController::class, 'edit']);
            Route::post('edit/{producttype}', [ProductTypeController::class, 'update']);
            Route::DELETE('destroy', [ProductTypeController::class, 'destroy']);
        });

        #product
        Route::prefix('products')->group(function () {
            Route::get('add', [ProductController::class, 'create']);
            Route::post('add', [ProductController::class, 'store']);
            Route::get('list', [ProductController::class, 'list']);
            Route::get('edit/{product}', [ProductController::class, 'edit']);
            Route::post('edit/{product}', [ProductController::class, 'update']);
            Route::DELETE('destroy', [ProductController::class, 'destroy']);
        });

        #user
        Route::prefix('users')->group(function () {
            Route::get('add', [AuthController::class, 'create']);
            Route::post('add', [AuthController::class, 'store']);
            Route::get('list', [AuthController::class, 'list']);
            Route::get('edit/{user}', [AuthController::class, 'edit']);
            Route::post('edit/{user}', [AuthController::class, 'update']);
            Route::DELETE('destroy', [AuthController::class, 'destroy']);
        });

        #product image
        Route::prefix('productimages')->group(function () {
            Route::get('add', [ProductImageController::class, 'create']);
            Route::post('add', [ProductImageController::class, 'store']);
            Route::get('list', [ProductImageController::class, 'list']);
            Route::get('edit/{productimage}', [ProductImageController::class, 'edit']);
            Route::post('edit/{productimage}', [ProductImageController::class, 'update']);
            Route::DELETE('destroy', [ProductImageController::class, 'destroy']);
        });

        #slide show
        Route::prefix('slideshows')->group(function () {
            Route::get('add', [SlideShowController::class, 'create']);
            Route::post('add', [SlideShowController::class, 'store']);
            Route::get('list', [SlideShowController::class, 'list']);
            Route::get('edit/{slideshow}', [SlideShowController::class, 'edit']);
            Route::post('edit/{slideshow}', [SlideShowController::class, 'update']);
            Route::DELETE('destroy', [SlideShowController::class, 'destroy']);
        });

        #coupon
        Route::prefix('coupons')->group(function() {
            Route::get('add', [CouponController::class, 'create']);
            Route::post('add', [CouponController::class, 'store']);
            Route::get('list', [CouponController::class, 'list']);
            Route::get('edit/{coupon}', [CouponController::class, 'edit']);
            Route::post('edit/{coupon}', [CouponController::class, 'update']);
            Route::DELETE('destroy', [CouponController::class, 'destroy']);
        });

        #comment
        Route::prefix('comments')->group(function () {
            Route::get('list', [CommentController::class, 'list']);
            Route::DELETE('destroy', [CommentController::class, 'destroy']);
        });

        #order
        Route::prefix('orders')->group(function () {
            Route::get('list', [OrderController::class, 'index']);
            Route::get('view/{invoices}', [OrderController::class, 'detail']);
            Route::post('view/{invoices}', [OrderController::class, 'update'])->name('update_status');
        });

        #upload image
        Route::post('upload/services', [UploadController::class, 'store']);
    });

    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

    Route::get('producttype/{id}-{slug}.html', [App\Http\Controllers\ProducttypeController::class, 'index']);
});

Route::get('product/{id}-{slug}.html', [App\Http\Controllers\ProductController::class, 'index']);
Route::post('product/{id}', [App\Http\Controllers\CommentController::class, 'create']);

Route::prefix('/profile')->group(function () {
    Route::get('/', [UserController::class, 'profile']);
    Route::get('/editprofile', [UserController::class, 'editprofile']);
    Route::post('/editprofile', [UserController::class, 'update']);
    Route::get('/password', [UserController::class, 'editpassword']);
    Route::post('/password', [UserController::class, 'updatepassword']);
});

Route::get('/userorderlist', [OrderUserController::class, 'list']);
Route::get('/userorderlist/{invoice}', [OrderUserController::class, 'vieworder']);
Route::post('/userorderlist/{invoice}', [OrderUserController::class, 'updateStatus'] )->name('update.status');
