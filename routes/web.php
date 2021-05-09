<?php

use App\Http\Controllers\Frontend\UsersController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\PagesController;
use App\Http\Controllers\Frontend\PageController;
use App\Http\Controllers\Backend\ProductController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Frontend\ProductsController;
use App\Http\Controllers\Backend\BrandsController;
use App\Http\Controllers\Frontend\CategoriesController;
use App\Http\Controllers\Backend\DivisionsController;
use App\Http\Controllers\Backend\DistrictsController;
use App\Http\Controllers\Frontend\VerificationController;

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

// Home Routes
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/shop', [PageController::class, 'index'])->name('index');

// Shop Routes
  Route::get('/shop/products', [ProductsController::class, 'index'])->name('products.index');
  Route::get('/shop/product/{slug}', [ProductsController::class, 'show'])->name('products.show');
  Route::get('/search', [PageController::class, 'search'])->name('search');

  // Categories Route
    Route::get('/shop/products/categories', [CategoriesController::class, 'index'])->name('categories.index');
    Route::get('/shop/products/category/{id}', [CategoriesController::class, 'show'])->name('categories.show');



// token Routes
Route::get('/token/{token}', [VerificationController::class, 'verify'])->name('user.verification');

// Users Route
Route::group(['prefix' => 'user'], function () {
    Route::get('/dashboard', [UsersController::class, 'dashboard'])->name('user.dashboard');
    Route::get('/profile', [UsersController::class, 'profile'])->name('user.profile');
    Route::post('/profile', [UsersController::class, 'profileUpdate'])->name('user.profile.update');
    Route::get('/logout', [UsersController::class, 'logout'])->name('user.logout');
});



// Product Routes
Route::group(['prefix' => 'admin'], function () {
    Route::get('/', [PagesController::class, 'index'])->name('admin.index');

    Route::group(['prefix' => '/product'], function () {
        Route::get('/', [ProductController::class, 'index'])->name('admin.products');
        Route::get('/create', [ProductController::class, 'create'])->name('admin.product.create');
        Route::post('/create', [ProductController::class, 'store'])->name('admin.product.store');
        Route::get('/edit/{id}', [ProductController::class, 'edit'])->name('admin.product.edit');
        Route::post('/edit/{id}', [ProductController::class, 'update'])->name('admin.product.update');
        Route::delete('/delete/{id}', [ProductController::class, 'delete'])->name('admin.product.delete');
    });
});

// Category Routes
Route::group(['prefix' => 'category'], function () {
    Route::group(['prefix' => '/product'], function () {
        Route::get('/', [CategoryController::class, 'index'])->name('admin.categories');

        Route::get('/create', [CategoryController::class, 'create'])->name('admin.category.create');
        Route::post('/create', [CategoryController::class, 'store'])->name('admin.category.store');

        Route::get('/edit/{id}', [CategoryController::class, 'edit'])->name('admin.category.edit');
        Route::post('/edit/{id}', [CategoryController::class, 'update'])->name('admin.category.update');

        Route::delete('/delete/{id}', [CategoryController::class, 'delete'])->name('admin.category.delete');
    });
});

// Brand Routes
Route::group(['prefix' => 'brands'], function () {
    Route::group(['prefix' => '/product'], function () {
        Route::get('/', [BrandsController::class, 'index'])->name('admin.brands');

        Route::get('/create', [BrandsController::class, 'create'])->name('admin.brand.create');
        Route::post('/create', [BrandsController::class, 'store'])->name('admin.brand.store');

        Route::get('/edit/{id}', [BrandsController::class, 'edit'])->name('admin.brand.edit');
        Route::post('/edit/{id}', [BrandsController::class, 'update'])->name('admin.brand.update');

        Route::delete('/delete/{id}', [BrandsController::class, 'delete'])->name('admin.brand.delete');
    });
});

// Division Routes
Route::group(['prefix' => 'divisions'], function () {
    Route::group(['prefix' => '/product'], function () {
        Route::get('/', [DivisionsController::class, 'index'])->name('admin.divisions');

        Route::get('/create', [DivisionsController::class, 'create'])->name('admin.division.create');
        Route::post('/create', [DivisionsController::class, 'store'])->name('admin.division.store');

        Route::get('/edit/{id}', [DivisionsController::class, 'edit'])->name('admin.division.edit');
        Route::post('/edit/{id}', [DivisionsController::class, 'update'])->name('admin.division.update');

        Route::delete('/delete/{id}', [DivisionsController::class, 'delete'])->name('admin.division.delete');
    });
});

// District Routes
Route::group(['prefix' => 'districts'], function () {
    Route::group(['prefix' => '/product'], function () {
        Route::get('/', [DistrictsController::class, 'index'])->name('admin.districts');

        Route::get('/create', [DistrictsController::class, 'create'])->name('admin.district.create');
        Route::post('/create', [DistrictsController::class, 'store'])->name('admin.district.store');

        Route::get('/edit/{id}', [DistrictsController::class, 'edit'])->name('admin.district.edit');
        Route::post('/edit/{id}', [DistrictsController::class, 'update'])->name('admin.district.update');

        Route::delete('/delete/{id}', [DistrictsController::class, 'delete'])->name('admin.district.delete');
    });
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
