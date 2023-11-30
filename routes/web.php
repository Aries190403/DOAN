<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Controller;

use App\Http\Controllers\LoginController;

use App\Http\Controllers\Admin\MainAdminController;
use App\Http\Controllers\Admin\ProductTypeController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\MainController;

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


Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login/store', [LoginController::class, 'store']);

Route::get('/', [MainController::class, 'index'])->name('home');

Route::middleware(['auth'])->group(function() {

    Route::prefix('admin')->group(function() {
        Route::get('/', [MainAdminController::class, 'index'])->name('admin');
        // Route::get('main', [MainController::class, 'index']);

        #product type
        Route::prefix('producttypes')->group(function() {
            Route::get('add', [ProductTypeController::class, 'create']);
            Route::post('add', [ProductTypeController::class, 'store']);
            Route::get('list', [ProductTypeController::class, 'list']);
            Route::get('edit/{producttype}', [ProductTypeController::class, 'edit']);
            Route::post('edit/{producttype}', [ProductTypeController::class, 'update']);
            Route::DELETE('destroy', [ProductTypeController::class, 'destroy']);
        });

        #product
        Route::prefix('products')->group(function() {
            Route::get('add', [ProductController::class, 'create']);
            Route::post('add', [ProductController::class, 'store']);
            Route::get('list', [ProductController::class, 'list']);
            Route::get('edit/{producttype}', [ProductController::class, 'edit']);
            Route::post('edit/{producttype}', [ProductController::class, 'update']);
            Route::DELETE('destroy', [ProductController::class, 'destroy']);
            Route::get('add', [ProductController::class, 'create']);
        });
    });
});
