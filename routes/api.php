<?php

use App\Http\Controllers\Api\V1\AuthController;
use App\Http\Controllers\Api\V1\FoodController;
use App\Http\Controllers\Api\V1\OrderController;
use App\Http\Controllers\Api\V1\RegisterController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::group([
   'middleware' => 'api',
   'prefix' => 'v1'
], function ($router) {
   Route::prefix('auth')->group(function () {
      Route::post('login', [AuthController::class, 'login'])->name('login');
      Route::get('logout', [AuthController::class, 'logout'])->name('logout');
      Route::post('refresh', [AuthController::class, 'refresh'])->name('refresh');
      Route::get('user', [AuthController::class, 'me'])->name('user');
   });

   Route::post('register', [RegisterController::class, 'store'])->name('register');
   Route::apiResource('order', OrderController::class);
   Route::apiResource('food', FoodController::class);
});
