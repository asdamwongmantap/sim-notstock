<?php

use App\Http\Controllers\CustomerController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\StockController;
use App\Http\Controllers\UserController;
use App\Models\Customer;

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

Route::get('/',[LoginController::class,'index']);
Route::post('/ceklogin',[LoginController::class,'ceklogin']);
Route::post('/saveproduct',[ProductController::class,'store']);
Route::post('/savestock',[StockController::class,'store']);
Route::post('/saveuser',[UserController::class,'store']);
Route::get('/logout',[LoginController::class,'logout']);
Route::group(['middleware' => 'auth'],function(){
    Route::get('/dashboard',[MainController::class,'index']);
    //product
    Route::get('/listproduct',[ProductController::class,'index']);
    Route::get('/addproduct',[ProductController::class,'create']);
    Route::get('/editproduct/{id}',[ProductController::class,'edit']);
    Route::post('/updateproduct/{id}',[ProductController::class,'update']);
    Route::get('/deleteproduct/{id}',[ProductController::class,'destroy']);
    Route::get('/detailproduct/{id}',[ProductController::class,'show']);
    Route::get('/editqtyproduct/{id}',[ProductController::class,'editqty']);
    Route::post('/updateqtyproduct/{id}',[ProductController::class,'updateqty']);
    //customer
    Route::get('/listcustomer',[CustomerController::class,'index']);
    Route::get('/detailcustomer/{id}',[CustomerController::class,'show']);
    // user module
    Route::get('/listuser',[UserController::class,'index']);
    Route::get('/adduser',[UserController::class,'create']);
    Route::get('/edituser/{id}',[UserController::class,'edit']);
    Route::post('/updateuser/{id}',[UserController::class,'update']);
    Route::get('/deleteuser/{id}',[UserController::class,'destroy']);
    //report
    Route::get('/reportstock',[ReportController::class,'index']);
    Route::post('/pdfstock',[ReportController::class,'show']);
});
