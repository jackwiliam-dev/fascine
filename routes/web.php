<?php

use App\Http\Controllers\Admin\MainController;
use App\Http\Controllers\Admin\Product\ProductController;
use App\Http\Controllers\Admin\Users\LoginController;
use App\Http\Controllers\FrontEnd\CartController;
use App\Http\Controllers\FrontEnd\Home\HomeController;
use Illuminate\Support\Facades\Route;


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


Route::get('/', [HomeController::class, 'index']);
Route::get('/admin/login', [LoginController::class , 'login'])->name('login');
Route::post('/admin/login/store', [LoginController::class, 'store']);


Route::middleware(['auth'])->group(function () {

    Route::get('admin', [MainController::class, 'index'])->name('admin');

    Route::get('/admin/home', [MainController::class, 'index']);

    Route::prefix('admin')->group(function () {


        Route::get('/logout', [
            'as' => 'admin.logout',
            'uses' => 'App\Http\Controllers\Admin\AdminController@logout'
        ]);

        //category
        Route::prefix('categories')->group(function () {

            Route::get('/', [
                'as' => 'categories.index',
                'uses' => 'App\Http\Controllers\CategoryController@index'
            ]);

            Route::get('/create', [
                'as' => 'categories.create',
                'uses' => 'App\Http\Controllers\CategoryController@create'
            ]);

            Route::post('/store', [
                'as' => 'categories.store',
                'uses' => 'App\Http\Controllers\CategoryController@store'
            ]);

            Route::get('/edit/{id}', [
                'as' => 'categories.edit',
                'uses' => 'App\Http\Controllers\CategoryController@edit'
            ]);

            Route::post('/update/{id}', [
                'as' => 'categories.update',
                'uses' => 'App\Http\Controllers\CategoryController@update'
            ]);

            Route::get('/delete/{id}', [
                'as' => 'categories.delete',
                'uses' => 'App\Http\Controllers\CategoryController@delete'
            ]);
        });

        //product
        Route::prefix('products')->group(function () {
            Route::get('/', [
                'as' => 'products.index',
                'uses' => 'App\Http\Controllers\Admin\Product\ProductController@index'
            ]);

            Route::get('/create', [
                'as' => 'products.create',
                'uses' => 'App\Http\Controllers\Admin\Product\ProductController@getViewCreateProduct'
            ]);

            Route::post('/store', [
                'as' => 'products.store',
                'uses' => 'App\Http\Controllers\Admin\Product\ProductController@createProduct'
            ]);

            Route::get('/edit/{id}', [
                'as' => 'products.edit',
                'uses' => 'App\Http\Controllers\Admin\Product\ProductController@edit'
            ]);

            Route::post('/update/{id}', [
                'as' => 'products.update',
                'uses' => 'App\Http\Controllers\Admin\Product\ProductController@update'
            ]);

            Route::get('/delete/{id}', [
                'as' => 'products.delete',
                'uses' => 'App\Http\Controllers\Admin\Product\ProductController@delete'
            ]);
        });

        //Menu
        Route::prefix('menus')->group(function () {

            Route::get('/', [
                'as' => 'menus.index',
                'uses' => 'App\Http\Controllers\Admin\Menu\MenuController@index'
            ]);

            Route::get('/create', [
                'as' => 'menus.create',
                'uses' => 'App\Http\Controllers\Admin\Menu\MenuController@create'
            ]);

            Route::post('/store', [
                'as' => 'menus.store',
                'uses' => 'App\Http\Controllers\Admin\Menu\MenuController@store'
            ]);

            Route::get('/edit/{id}', [
                'as' => 'menus.edit',
                'uses' => 'App\Http\Controllers\Admin\Menu\MenuController@edit'
            ]);

            Route::post('/update/{id}', [
                'as' => 'menus.update',
                'uses' => 'App\Http\Controllers\Admin\Menu\MenuController@update'
            ]);

            Route::get('/delete/{id}', [
                'as' => 'menus.delete',
                'uses' => 'App\Http\Controllers\Admin\Menu\MenuController@delete'
            ]);
        });

        //tag
        Route::prefix('tags')->group(function () {

        });

        //slider
        Route::prefix('slider')->group(function () {
            Route::get('/', [
                'as' => 'sliders.index',
                'uses' => 'App\Http\Controllers\Admin\Slider\SliderController@index'
            ]);

            Route::get('/create', [
                'as' => 'sliders.create',
                'uses' => 'App\Http\Controllers\Admin\Slider\SliderController@create'
            ]);

            Route::post('/store', [
                'as' => 'sliders.store',
                'uses' => 'App\Http\Controllers\Admin\Slider\SliderController@store'
            ]);

            Route::get('/edit/{id}', [
                'as' => 'sliders.edit',
                'uses' => 'App\Http\Controllers\Admin\Slider\SliderController@edit'
            ]);

            Route::post('/update/{id}', [
                'as' => 'sliders.update',
                'uses' => 'App\Http\Controllers\Admin\Slider\SliderController@update'
            ]);

            Route::get('/delete/{id}', [
                'as' => 'sliders.delete',
                'uses' => 'App\Http\Controllers\Admin\Slider\SliderController@delete'
            ]);
        });

    });

});

Route::prefix('/')->group(function () {

    Route::post('add-cart', [CartController::class, 'index']);
    Route::get('carts', [CartController::class, 'show']);
    Route::post('update-cart', [CartController::class, 'update']);
    Route::get('carts/delete/{id}', [CartController::class, 'remove']);
    Route::post('carts', [CartController::class, 'addCart']);

    Route::get('product/{slug}/{id}', [
        'as' => 'product.detail',
        'uses' => 'App\Http\Controllers\FrontEnd\DetailProduct\DetailProductController@detailProduct'
    ]);
});




