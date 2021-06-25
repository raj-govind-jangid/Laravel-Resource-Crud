<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\VendorController;
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

Route::view('/login','login');

Route::view('/register','register');

Route::post('/login',[LoginController::class,'login']);

Route::post('/register',[LoginController::class,'register']);

Route::get('/logout',[LoginController::class,'logout']);

Route::get('/',[LoginController::class,'home']);

// Middleware For Vendor

Route::group(['middleware' => 'vendor'], function () {

Route::get('/vendor',[VendorController::class,'vendor']);

Route::view('/addproduct','.vendor.addproduct');

Route::post('/addproduct',[VendorController::class,'addproduct']);

});

// Middleware For Admin

Route::group(['middleware' => 'admin'], function () {

Route::resource('product','ProductController',[
    'except' => [ 'show' ]
]);

});




