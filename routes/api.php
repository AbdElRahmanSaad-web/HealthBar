<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\CartController;
use App\Http\Controllers\Api\LoginController;
use App\Http\Controllers\Api\AddressController;
use App\Http\Controllers\Api\GetMealsController;
use App\Http\Controllers\Api\RegisterController;
use App\Http\Controllers\Api\VerifyOtpController;
use App\Http\Controllers\Api\GetCategoryController;
use App\Http\Controllers\Api\GetMainDishController;
use App\Http\Controllers\Api\ResetPasswordController;
use App\Http\Controllers\Api\ForgetPasswordController;
use App\Http\Controllers\Api\GetMainCategoryDetailsController;
use App\Http\Controllers\Api\LogOutController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/



Route::post('register', [RegisterController::class, 'index']);
Route::post('verifyOtp', [VerifyOtpController::class, 'index']);
Route::post('login', [LoginController::class, 'index']);
Route::post('forgetPassword', [ForgetPasswordController::class, 'index']);
Route::post('resetPassword', [ResetPasswordController::class, 'index']);
Route::get('getMeals', [GetMealsController::class, 'index']);
Route::get('getCategory', [GetCategoryController::class, 'index']);
Route::get('getMainDish', [GetMainDishController::class, 'index']);
Route::get('getMainCategoryDetails', [GetMainCategoryDetailsController::class, 'index']);
// Route::get('MyCart');
Route::middleware('auth:sanctum')->group(function(){
    Route::get('login', function(){
    });
    Route::post('addToCart', [CartController::class, 'addToCart']);
    Route::delete('deleteItem/{id}', [CartController::class, 'deleteItem']);
    Route::put('editToCart/{id}', [CartController::class, 'editToCart']);
    Route::get('getCartDetails', [CartController::class, 'index']);
    Route::post('addAddress', [AddressController::class, 'addAddress']);
    Route::post('checkoutCart', [CartController::class, 'checkoutCart']);
    Route::post('logOut', [LogOutController::class, 'logOut']);
});

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
