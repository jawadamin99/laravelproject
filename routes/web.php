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
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Ajax;

//routes for public users
Route::get('/', [HomeController::class, 'home']);
Route::get('/about', [HomeController::class, 'about']);

//routes for logged in users
Route::middleware(['loggedinuser'])->group(function () {
    Route::post('/add_profile_picture', [HomeController::class, 'add_profile_picture']);
    Route::get('/my_account', [HomeController::class, 'my_account']);
    Route::get('/my_addresses', [HomeController::class, 'my_addresses']);
    Route::post('/add_billing_address', [HomeController::class, 'add_billing_address']);
    Route::post('/add_delivery_address', [HomeController::class, 'add_delivery_address']);
    Route::post('/ajax/get_address', [Ajax::class, 'get_address']);
    Route::post('/edit_billing_address', [HomeController::class, 'edit_billing_address']);
    Route::post('/edit_delivery_address', [HomeController::class, 'edit_delivery_address']);
    Route::post('/delete_address', [HomeController::class, 'delete_address']);

    Route::get('/register', [HomeController::class, 'register']);
    Route::post('/register', [HomeController::class, 'register_handler']);
    Route::get('/login', [HomeController::class, 'login']);
    Route::post('/login', [HomeController::class, 'login_handler'])->name('login');
    Route::get('/logout', [HomeController::class, 'logout']);
    Route::get('/change_password/{token}', [HomeController::class, 'change_password'])->name('change_password');
    Route::get('/activate_account/{token}', [HomeController::class, 'activate_account'])->name('activate_account');
    Route::post('/change_password_handler', [HomeController::class, 'change_password_handler']);
    Route::post('/forget_password_handler', [HomeController::class, 'forget_password_handler']);
    Route::get('/forget_password', [HomeController::class, 'forget_password']);

});

/* Admin Routes */
Route::prefix('admin')->group(function () {
    Route::get('login', [AdminController::class, 'login']);
    Route::post('login', [AdminController::class, 'login_handler']);
    Route::get('logout', [AdminController::class, 'logout'])->name('admin.logout');

    Route::middleware(['adminaccess'])->group(function () {
        Route::get('/', [AdminController::class, 'index'])->name('admin');
        Route::get('dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
        Route::get('addCategory', [AdminController::class, 'addCategory'])->name('admin.addCategory');
        Route::post('addCategory', [AdminController::class, 'addCategory_handler'])->name('admin.addCategorySubmit');
        Route::get('categories', [AdminController::class, 'categories'])->name('admin.categories');
    });
});
