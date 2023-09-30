<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\UserController;
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

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::post('/password_reset/{mail}', [AuthController::class, 'passwordReset']);

Route::middleware('auth:api')->group(function () {
    Route::get('/me', [AuthController::class, 'user']);
    Route::get('/logout', [AuthController::class, 'logout']);
    Route::resource('/users',UserController::class);
    Route::post('/point_assign',[UserController::class, 'point_assign']);
});
