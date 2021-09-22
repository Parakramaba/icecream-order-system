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
Route::get('/home',[App\Http\Controllers\CustomerController::class, 'index'])->name('customer.home');
Route::post('/home/order/create',[App\Http\Controllers\CustomerController::class, 'placeOrder'])->name('place.order');
// /CUSTOMER

// VENDOR
Route::get('/vendor/home',[App\Http\Controllers\Vendor\HomeController::class, 'index'])->name('vendor.home');

// Toppings Page
Route::get('/vendor/toppings',[App\Http\Controllers\Vendor\ToppingController::class, 'index'])->name('vendor.toppings');
Route::post('/vendor/toppings/add',[App\Http\Controllers\Vendor\ToppingController::class, 'createTopping'])->name('vendor.create.topping');
Route::get('/vendor/toppings/table', [App\Http\Controllers\Vendor\ToppingController::class, 'getToppingsList'])->name('vendor.toppings.table');
Route::post('/vendor/toppings/edit/details', [App\Http\Controllers\Vendor\ToppingController::class, 'editToppingGetDetails'])->name('vendor.edit.topping.details');
Route::post('/vendor/toppings/edit', [App\Http\Controllers\Vendor\ToppingController::class, 'editTopping'])->name('vendor.edit.topping');
// /Toppings Page

// /VENDOR