<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\ItemController;
use App\Http\Controllers\Admin\MealController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\Auth\AuthController;
use App\Http\Controllers\Admin\Home\HomeController;
use App\Http\Controllers\Admin\Order\OrderController;
use App\Http\Controllers\Admin\PromoCodes\PromoCodeController;
use App\Http\Controllers\Admin\SubCategoryController;
use App\Http\Controllers\Admin\User\UserController;

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
        // Route::get('/', [AuthController::class, 'dashboard'])->name('home');
        Route::resource('categories', CategoryController::class);
        Route::resource('sub_categories', SubCategoryController::class);
        Route::resource('items', ItemController::class);
        Route::resource('meals', MealController::class);
        //Users Routes
        Route::get('users', [UserController::class,'index'])->name('users.index');
        Route::get('users/{id}', [UserController::class,'show'])->name('users.show');
        Route::delete('users/{id}', [UserController::class,'delete'])->name('users.destroy');

        //promoCodes Routes
        // Route::get('promoCodes', [PromoCodeController::class,'index'])->name('promoCodes.index');
        Route::get('promoCodes', [PromoCodeController::class,'requests_index'])->name('promoCodes.index');
        Route::get('promoCodesCreate', [PromoCodeController::class,'create'])->name('promoCodes.create');
        Route::post('promoCodes', [PromoCodeController::class,'store'])->name('promoCodes.store');

        Route::get('promoCodes/{id}', [PromoCodeController::class,'edit'])->name('promoCodes.edit');
        Route::put('promoCodes',[PromoCodeController::class,'update'])->name('promoCodes.update');
        Route::delete('promoCodesDelete/{id}', [PromoCodeController::class,'delete'])->name('promoCodes.destroy');

        //orders Routes
        Route::get('orders',[OrderController::class,'index'])->name('orders.index');
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
// Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
