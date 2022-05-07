<?php

use App\Http\Controllers\Admin\AdminController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\DesignController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\ProductsController;
use App\Http\Controllers\Admin\ShipperController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;

use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductControllerClient;


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




//Auth
Route::get('/register',[AuthController::class,'register'])->name('register');
Route::post('/register', [AuthController::class,'postRegister'])->name("postRegister");
Route::get('/login', [AuthController::class,'loginClient'])->name("login");
Route::post('/login', [AuthController::class,'postLogin'])->name("postLogin");
Route::get('/logout',[AuthController::class,'logout'])->name('logout');
//

Route::get('/', [HomeController::class,'index'])->name("home");
Route::get('/products', [ProductControllerClient::class,'index'])->name("products");
Route::get('/products/category/{id}', [ProductControllerClient::class,'getCategory'])->name("product-cate");

Route::get('/product/detail/{id}',[ProductControllerClient::class,'show'])->name('productDetail');
Route::post('/add-to-cart',[CartController::class,'store'])->name('add-to-cart');

Route::middleware('auth')->group(function (){
    Route::get('/cart',[CartController::class,'index'])->name('cart');
    Route::post('/remove-cart-item',[CartController::class,'destroy']);
    Route::post('/update-cart',[CartController::class,'update']);
    Route::get('/checkout',[CheckoutController::class,'index'])->name('checkout');
    Route::get('/my-orders',[UserController::class,'my_orders'])->name('myoders');
    Route::get('/my-orders/{id}',[UserController::class,'view_order'])->name('orderdetail');
    Route::post('/checkout',[CheckoutController::class,'order'])->name('order');
    Route::get('/my-account',[UserController::class,'view_profile'])->name('account');
    Route::post('/update-account',[UserController::class,'edit_user'])->name('update-profile');
    
});

Route::prefix('shipper')->middleware('RoleShipper')->group(function () {
    Route::get('/',[ShipperController::class,'index'])->name('shipper');
    Route::get('/view/{id}',[ShipperController::class,'view'])->name('shipper.show');

    Route::post('/add',[ShipperController::class,'addWork']);

    Route::get('/work',[ShipperController::class,'mywork'])->name('shipper.x');
    Route::get('/history',[ShipperController::class,'history'])->name('shipper.y');
});
Route::name('admin.')->middleware('admin')->group(function () {

    Route::prefix('admin')->group(function () {
       
        Route::get('/home',[AdminController::class,'index'])->name('index');
         
        Route::prefix('products')->group(function () {
            Route::get('/',[ProductsController::class, 'index'])->name('products');

            Route::get('/them-san-pham', [ProductsController::class, 'create'])->name('products.create');

            Route::post('/them-san-pham', [ProductsController::class, 'store'])->name('products.store');

            Route::get('/{id}', [ProductsController::class, 'show'])->name('products.show');

            Route::get('/edit/{id}', [ProductsController::class, 'edit'])->name('products.edit');

            Route::post('/update/{id}', [ProductsController::class, 'update'])->name('products.update');

            Route::post('/activesale', [ProductsController::class, 'setActiveSale']);

            Route::post('/active-products', [ProductsController::class, 'setActive']);

            Route::delete('/destroy', [ProductsController::class, 'destroy'])->name('products.destroy');
        });

        Route::prefix('category')->group(function () {
            Route::get('/',[CategoryController::class, 'index'])->name('category');

            Route::get('/create', [CategoryController::class, 'create'])->name('category.create');

            Route::post('/create', [CategoryController::class, 'store'])->name('category.store');

            Route::get('/{id}', [CategoryController::class, 'show'])->name('category.show');

            Route::get('/edit/{id}', [CategoryController::class, 'edit'])->name('category.edit');

            Route::post('/update/{id}', [CategoryController::class, 'update'])->name('category.update');

            Route::delete('/destroy', [CategoryController::class, 'destroy'])->name('category.destroy');
        });
        Route::prefix('design')->group(function () {
            Route::get('/banner', [DesignController::class, 'banner'])->name('design.banner');
            Route::get('/slider', [DesignController::class, 'sliders'])->name('design.slider');

        });

        Route::prefix('order')->group(function () {
            Route::get('/',[OrderController::class, 'index'])->name('order.index');
            Route::get('/finish',[OrderController::class, 'finish'])->name('order.finish');
            Route::get('/',[OrderController::class, ''])->name('order.index');
            Route::get('/',[OrderController::class, 'index'])->name('order.index');

            Route::get('/view/{id}',[OrderController::class,'view_order'])->name('order.show');

            Route::post('/update', [OrderController::class, 'update'])->name('order.update');

            Route::delete('/destroy', [OrderController::class, 'destroy'])->name('order.destroy');
        });
        Route::middleware('RoleAdmin')->group(function(){
            Route::get('/member',[AuthController::class,'getList'])->name('listmember');
            Route::get('/member/add',[AuthController::class,'registerAdm'])->name('addmember');
            Route::post('/member/add',[AuthController::class,'postRegisterAdm'])->name('postaddmember');

        });
    });
});