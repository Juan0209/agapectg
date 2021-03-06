<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\ShoppingController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\FileproductController;
use Illuminate\Support\Facades\Route;

//Home Routes
Route::get('/', [HomeController::class,'welcome'])->name('welcome.index')->middleware('guest');
Route::get('/contact', [HomeController::class,'contact'])->name('contact');
Route::post('/contact/send', [HomeController::class,'sendMessage'])->name('send.message');
Route::get('/about', [HomeController::class,'about'])->name('about');
Route::post('/send/code', [HomeController::class,'forgotPassword'])->name('forgotPassword');
Route::post('/validate/code', [HomeController::class,'validateCode'])->name('validateCode');
Route::put('/update/information', [HomeController::class,'updateInfo'])->name('updateInfo');

//Admin actions
Route::get('/home', [HomeController::class,'welcome'])->name('home.index');
Route::post('/Nuevo-Admin', [AdminController::class,'create'])->name('newAdmin')->middleware('auth');
Route::get('/Funcionarios', [AdminController::class,'view'])->name('officials')->middleware('auth');
Route::delete('/Borrar-Funcionarios/{fact}', [AdminController::class,'destroy'])->name('destroy.user')->middleware('auth');
Route::put('/update/user', [AdminController::class,'update'])->name('update.user')->middleware('auth');
Route::get('/orders', [ShoppingController::class,'orders'])->name('orders')->middleware('auth');
Route::get('/orders/{id}/{mode}', [ShoppingController::class,'order'])->name('order')->middleware('auth');
Route::get('/delivery', [ShoppingController::class,'delivery'])->name('delivery')->middleware('auth');
Route::get('/delivery/confirmation', [ShoppingController::class,'confirmationDelivery'])->name('confirmationDelivery')->middleware('auth');
Route::get('/bill', [ShoppingController::class,'bill'])->name('bill')->middleware('auth');
Route::get('/state/{bill}/{view}', [ShoppingController::class,'state'])->name('state')->middleware('auth');
Route::get('/clear/system', [AdminController::class,'clearSystem'])->name('clearSystem')->middleware('auth');

//Table Users
Route::get('/user', [AdminController::class,'users'])->name('user')->middleware('auth');

//Products
Route::get('/products', [ProductsController::class,'index'])->name('products');
Route::get('/products/{id}', [ProductsController::class,'productList'])->name('productList');
Route::get('/products/catalogues/{catalogue}',[ProductsController::class,'catalogues'])->name('catalogues');
Route::get('/product/search', [ProductsController::class,'search'])->name('search');
Route::get('/product/consult/', [ProductsController::class,'consult'])->name('consult');

//Shopping actions
Route::get('/cart', [ShoppingController::class, 'cart'])->name('cart');
Route::post('/cart/add', [ShoppingController::class, 'productCart'])->name('cart.add')->middleware('auth');
Route::get('/payment/bill/{message}/{dissable}', [ShoppingController::class, 'payment'])->name('payment')->middleware('auth');
Route::get('/confirmation', [ShoppingController::class, 'confirmation'])->name('confirmation')->middleware('auth');
Route::delete('/Cancelar/Compra/{id}',[ShoppingController::class,'cancelPurchase'])->name('cancelPurchase')->middleware('auth');;
Route::delete('/Cancelar/producto/{id}',[ShoppingController::class,'cancelProduct'])->name('cancelProduct')->middleware('auth');;


Route::post('/payment/confirmation', [ShoppingController::class, 'confirmationPay'])->name('confirmationPay')->middleware('auth');;
Route::get('/payment/response', [ShoppingController::class, 'response'])->name('response')->middleware('auth');;
Route::get('/payment/transaccion/{transaccion}/{referencia}', [ShoppingController::class, 'transaccion'])->name('transaccion');

//ProductsCRUD actions
Route::get('/crud',[ProductsController::class,'crud'])->name('crud')->middleware('auth');
Route::put('/update',[ProductsController::class,'update'])->name('update')->middleware('auth');
Route::post('/store',[ProductsController::class,'store'])->name('store')->middleware('auth');
Route::delete('/destroy',[ProductsController::class,'destroy'])->name('destroy')->middleware('auth');
Route::post('/create',[ProductsController::class,'create'])->name('create')->middleware('auth');

//FILE PRODUCT
Route::get('/file',[FileproductController::class,'show'])->name('fileview');
Route::post('/file/store', [FileproductController::class,'store'])->name('file.store');

//clear cache
Route::get('/clearcache', function () {
    echo Artisan::call('config:clear');
    echo Artisan::call('config:cache');
    echo Artisan::call('cache:clear');
    echo Artisan::call('route:clear');
    echo Artisan::call('route:cache');
    echo Artisan::call('view:clear');
    echo Artisan::call('view:cache');

    return back();
});
