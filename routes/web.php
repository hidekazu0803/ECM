<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\ProfileController;

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

Route::group(["middleware"=>"auth"],function(){
    Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    #item
    Route::get('/item/create', [ItemController::class, 'create'])->name('item.create');
    Route::post('/item/store', [ItemController::class, 'store'])->name('item.store');
    Route::get('/item/{id}/show', [ItemController::class, 'show'])->name('item.show');

    #cart
    Route::get('/carts', [CartController::class,'index'])->name('carts');
    Route::post('/carts/{item_id}/store', [CartController::class,'store'])->name('carts.store');
    Route::delete('/carts/{id}/delete', [CartController::class,'delete'])->name('carts.delete');
    Route::patch('/carts/{id}/purchase', [CartController::class,'purchase'])->name('carts.purchase');

    #admin
    Route::group(['prefix'=>'admin', 'as' => 'admin.', 'middleware'=>'can:admin'], function(){
    #User
    Route::get('/users',[UserController::class,'index'])->name('users');
    Route::delete('/users/{id}/deactivate',[UserController::class,'deactivate'])->name('users.deactivate');
    Route::patch('/users/{id}/activate',[UserController::class,'activate'])->name('users.activate');

    #item
    Route::get('/item',[App\Http\Controllers\Admin\ItemController::class,'index'])->name('item');
    Route::get('/item/{id}/edit',[App\Http\Controllers\Admin\ItemController::class,'edit'])->name('item.edit');
    Route::patch('/item/{id}/update',[App\Http\Controllers\Admin\ItemController::class,'update'])->name('item.update');
    Route::delete('/item/{id}/delete',[App\Http\Controllers\Admin\ItemController::class,'delete'])->name('item.delete');
    });

    #profile
    Route::get('/profile/show',[ProfileController::class,'show'])->name('profile.show');
    Route::get('/profile/edit',[ProfileController::class,'edit'])->name('profile.edit');
    Route::patch('/profile/update',[ProfileController::class,'update'])->name('profile.update');
   // Route::get('/profile/showCart',[ProfileController::class,'ShowCart'])->name('profile.showCart');


});

