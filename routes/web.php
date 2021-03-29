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

//Admin actions
Route::get('/home', [HomeController::class,'welcome'])->name('home.index');
Route::post('/Nuevo-Admin', [AdminController::class,'create'])->name('newAdmin')->middleware('auth');
Route::get('/Funcionarios', [AdminController::class,'view'])->name('officials')->middleware('auth');
Route::delete('/Borrar-Funcionarios/{fact}', [AdminController::class,'destroy'])->name('destroy.user')->middleware('auth');

//Shopping actions
Route::get('/cart', [ShoppingController::class, 'cart'])->name('cart');
Route::post('/cart/add', [ShoppingController::class, 'productCart'])->name('cart.add')->middleware('auth');
Route::get('/payment/bill/{message}/{dissable}', [ShoppingController::class, 'payment'])->name('payment')->middleware('auth');
Route::get('/confirmation', [ShoppingController::class, 'confirmation'])->name('confirmation')->middleware('auth');
Route::get('/products', [ProductsController::class,'index'])->name('products');
Route::get('/products/{id}', [ProductsController::class,'productList'])->name('productList');
Route::get('/products/catalogues/{catalogue}',[ProductsController::class,'catalogues'])->name('catalogues');
Route::delete('/Cancelar/Compra/{id}',[ShoppingController::class,'cancelPurchase'])->name('cancelPurchase');
Route::delete('/Cancelar/producto/{id}',[ShoppingController::class,'cancelProduct'])->name('cancelProduct');


Route::post('/payment/confirmation', [ShoppingController::class, 'confirmationPay'])->name('confirmationPay');
Route::get('/payment/response', [ShoppingController::class, 'response'])->name('response');
Route::get('/payment/transaccion/{transaccion}/{referencia}', [ShoppingController::class, 'transaccion'])->name('transaccion');

//ProductsCRUD actions
Route::get('/crud',[ProductsController::class,'crud'])->name('crud')->middleware('auth');
/*Route::get('/crud/{id}',[ProductsController::class,'edit'])->name('edit')->middleware('auth');*/
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

    return back();
});
