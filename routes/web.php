<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\ItemController;
use App\Http\Controllers\Admin\MealController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\Auth\AuthController;
use App\Http\Controllers\Admin\Home\HomeController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

// Admin Routes
Route::prefix('admin')->name('admin.')->group( function () {
    Route::get('/', function () {
        return redirect()->route('admin.home');
    });

    // Admin Auth Protected Routes
    Route::middleware('auth:admin')->group( function () {
        Route::post('logout', [AuthController::class, 'logout'])->name('logout');
        Route::get('home', [HomeController::class, 'index'])->name('home');
        Route::get('logout', [AuthController::class, 'logout'])->name('logout');
        Route::get('/', [AuthController::class, 'dashboard'])->name('home');
        Route::resource('categories', CategoryController::class);
        Route::resource('items', ItemController::class);
        Route::resource('meals', MealController::class);
    });
    // Admin Guest Routes
    Route::middleware('guest:admin')->group( function () {
        Route::get('login', [AuthController::class, 'loginForm'])->name('login.form');
        Route::post('login', [AuthController::class, 'login'])->name('login');
    });
});


// Route::get('test', function () {
//     return view('Admin.Auth.login');
// });