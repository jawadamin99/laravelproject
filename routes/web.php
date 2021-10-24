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

Route::get('/', [HomeController::class,'home']);
Route::get('/about', [HomeController::class,'about']);
Route::get('/register', [HomeController::class,'register']);
Route::post('/register', [HomeController::class,'register_handler']);
Route::get('/login', [HomeController::class,'login']);
Route::post('/login', [HomeController::class,'login_handler']);
Route::get('/logout', [HomeController::class,'logout']);
Route::get('/my_account', [HomeController::class,'my_account']);
