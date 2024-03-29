<?php

use App\Http\Controllers\Api\ForgetPasswordController;
use App\Http\Controllers\Api\GetCategoryController;
use App\Http\Controllers\Api\GetMealsController;
use App\Http\Controllers\Api\LoginController;
use App\Http\Controllers\Api\RegisterController;
use App\Http\Controllers\Api\ResetPasswordController;
use App\Http\Controllers\Api\VerifyOtpController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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
Route::middleware('auth:sanctum')->group(function(){
    // Route::
});

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
