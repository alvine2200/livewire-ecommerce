<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ColorsController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ProductController;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

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
});
