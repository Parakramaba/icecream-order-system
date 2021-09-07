<?php

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

// CUSTOMER 
Route::get('/customer',[App\Http\Controllers\CustomerController::class, 'index'])->name('customer.home');
Route::post('/order/create',[App\Http\Controllers\CustomerController::class, 'placeOrder'])->name('place.order');
// /CUSTOMER

// VENDOR
Route::get('/vendor',[App\Http\Controllers\VendorController::class, 'index'])->name('vendor.home');
Route::post('/vendor/add/topping',[App\Http\Controllers\VendorController::class, 'addTopping'])->name('vendor.add.topping');
Route::get('/vendor/toppings/table', [App\Http\Controllers\VendorController::class, 'getToppingsList'])->name('vendor.toppings.table');
// /VENDOR