<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\StockController;

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
Route::group(['middleware' => 'auth'],function(){
    Route::get('/dashboard',[MainController::class,'index']);
    //product
    Route::get('/listproduct',[ProductController::class,'index']);
    Route::get('/addproduct',[ProductController::class,'create']);
    Route::get('/editproduct/{id}',[ProductController::class,'edit']);
    Route::post('/updateproduct/{id}',[ProductController::class,'update']);
    Route::get('/deleteproduct/{id}',[ProductController::class,'destroy']);
    Route::get('/detailproduct/{id}',[ProductController::class,'show']);
    //stock
    Route::get('/liststock',[StockController::class,'index']);
    Route::get('/addstock',[StockController::class,'create']);
    Route::get('/editstock/{id}',[StockController::class,'edit']);
    Route::post('/updatestock/{id}',[StockController::class,'update']);
    Route::get('/deletestock/{id}',[StockController::class,'destroy']);
    Route::get('/detailstock/{id}',[StockController::class,'show']);
});
