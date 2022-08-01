<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;
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
    if(Session::has('user')){
        return view('profile');
    }
        
    else
    {
        return view('login');
    }
});
Route::post('/login',[UserController::class,'login']);
Route::post('/register',[UserController::class,'register']);
Route::get('/logout',[UserController::class,'logout']);
Route::get('products',[ProductController::class,'index']);
Route::get('detail/{id}',[ProductController::class,'detail']);
Route::get('/search',[ProductController::class,'search']);
Route::post('/add_to_cart',[ProductController::class,'add_to_cart']);
Route::get('/cartItems',[ProductController::class,'getCartItems']);
Route::get('/removeCart/{id}',[ProductController::class,'remove']);
Route::get('ordernow',[ProductController::class,'orderNow']);
Route::post('/orderplace',[ProductController::class,'orderPlace']);
Route::get('myorders',[ProductController::class,'myOrders']);
Route::get('/recieve/{id}',[ProductController::class,'recieve']);
Route::get('temp',[ProductController::class,'temp']);
Route::view('profile','profile');
Route::view('register','register');
