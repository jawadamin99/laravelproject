<?php

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
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Ajax;

Route::get('/', [HomeController::class,'home']);
Route::get('/about', [HomeController::class,'about']);
Route::get('/register', [HomeController::class,'register']);
Route::post('/register', [HomeController::class,'register_handler']);
Route::get('/login', [HomeController::class,'login']);
Route::post('/login', [HomeController::class,'login_handler']);
Route::get('/logout', [HomeController::class,'logout']);
Route::get('/forget_password', [HomeController::class,'forget_password']);
Route::post('/forget_password_handler', [HomeController::class,'forget_password_handler']);
Route::get('/my_account', [HomeController::class,'my_account']);
Route::get('/my_addresses', [HomeController::class,'my_addresses']);
Route::post('/add_billing_address', [HomeController::class,'add_billing_address']);
Route::post('/add_delivery_address', [HomeController::class,'add_delivery_address']);
Route::post('/ajax/get_address', [Ajax::class,'get_address']);
Route::post('/edit_billing_address', [HomeController::class,'edit_billing_address']);
Route::post('/edit_delivery_address', [HomeController::class,'edit_delivery_address']);
Route::post('/delete_address', [HomeController::class,'delete_address']);
Route::get('/change_password', [HomeController::class,'change_password'])->name('change_password');
