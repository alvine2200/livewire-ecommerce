<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ColorsController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\HomeSliderController;
use App\Http\Controllers\Admin\AdminOrderController;
use App\Http\Controllers\Admin\InvoiceController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\SiteSettingsController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Home\CartController;
use App\Http\Controllers\Home\CheckoutController;
use App\Http\Controllers\Home\FrontendController;
use App\Http\Controllers\Home\OrderController;
use App\Http\Controllers\Home\WishlistController;

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


Auth::routes();

Route::controller(FrontendController::class)->group(function () {
    Route::get('/', 'index');
    Route::get('collections', 'categories');
    Route::get('collections/{slug}', 'products');
    Route::get('collections/{category_slug}/{peoduct_slug}', 'productDetails');
    Route::get('thank_you', 'thanks');
    Route::get('new_arrivals', 'newArrivals');
    Route::get('featured_products', 'featuredProducts');
    Route::get('search', 'SearchProducts');
});
Route::middleware(['auth'])->group(function () {
    Route::controller(WishlistController::class)->group(function () {
        Route::get('/wishlist', 'index');
    });
    Route::controller(CartController::class)->group(function () {
        Route::get('view_cart', 'index');
    });
    Route::controller(CheckoutController::class)->group(function () {
        Route::get('checkout', 'index');
    });
    Route::controller(OrderController::class)->group(function () {
        Route::get('orders', 'index');
        Route::get('orders/{orders}', 'view_orders');
    });
});
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::prefix('admin')->middleware(['auth', 'isAdmin'])->group(function () {
    Route::get('dashboard', [DashboardController::class, 'index']);
    Route::any('logout', [DashboardController::class, 'logout']);

    //category Controller routes
    Route::controller(CategoryController::class)->group(function () {
        Route::get('category', 'index');
        Route::get('category/create', 'create');
        Route::post('category/store', 'store');
        Route::get('category/{category}/edit', 'edit');
        Route::post('category/{category}/update', 'update');
        Route::any('category/{category}/delete', 'delete');
    });

    //routes for brands livewire
    Route::get('brands', App\Http\Livewire\Admin\Brand\Index::class);

    //admin backend products routes
    Route::controller(ProductController::class)->group(function () {
        Route::get('products', 'index');
        Route::get('products/create', 'create');
        Route::post('products/store', 'store');
        Route::get('products/{products}/edit', 'edit');
        Route::post('products/{products}/update', 'update');
        Route::any('products/{products}/delete', 'delete');
        Route::any('products/{products}/remove_image', 'remove');
        Route::post('product_color/{prod_color_id}', 'updateProductColorQuantity');
        Route::any('product_color/{prod_color_id}/delete', 'deleteProductColor');
    });

    //admin color crud
    Route::controller(ColorsController::class)->group(function () {
        Route::get('colors', 'index');
        Route::get('colors/create', 'create');
        Route::post('colors/store', 'store');
        Route::get('colors/{colors}/edit', 'edit');
        Route::post('colors/{colors}/update', 'update');
        Route::any('colors/{colors}/delete', 'delete');
        Route::any('colors/{colors}/remove_image', 'remove');
    });

    //admin home-slider crud
    Route::controller(HomeSliderController::class)->group(function () {
        Route::get('slider', 'index');
        Route::get('slider/create', 'create');
        Route::post('slider/store', 'store');
        Route::get('slider/{slider}/edit', 'edit');
        Route::post('slider/{slider}/update', 'update');
        Route::any('slider/{slider}/delete', 'delete');
        Route::any('slider/{slider}/remove_image', 'remove');
    });

    //admin orders
    Route::controller(AdminOrderController::class)->group(function () {
        Route::get('orders', 'index');
        Route::get('orders/{orders}', 'orders');
        Route::put('orders/{orders}', 'statusUpdate');
    });

    //admin invoice
    Route::controller(InvoiceController::class)->group(function () {
        Route::get('invoice/{orders}/view', 'viewInvoice');
        Route::get('invoice/{orders}/download', 'downloadInvoice');
        Route::get('invoice/{orders}/mail', 'sendOrderMail');
    });

    //admin site setting globals
    Route::controller(SiteSettingsController::class)->group(function () {
        Route::get('setting', 'index');
        Route::post('set', 'store');
    });

    //user routes
    Route::controller(UserController::class)->group(function () {
        Route::get('users', 'index');
        Route::get('users/create', 'create');
        Route::post('users/store', 'store');
        Route::get('users/{user}/edit', 'edit');
        Route::PUT('users/{user}/update', 'update');
        Route::any('users/{user}/delete', 'destroy');
    });
});
