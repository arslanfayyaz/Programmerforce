<?php

use App\Http\Controllers\AddressController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AttendenceController;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('login', [AuthController::class, 'login']);
Route::post('users', [UserController::class, 'store']);
Route::get('check-ip',[AttendenceController::class,'checkIPAddress']);
Route::get('/check-in', [AttendenceController::class, 'checkIn']);
Route::get('checkout', [AttendenceController::class, 'checkout']);
Route::get('registerIp', [AttendenceController::class, 'registerIP']);


Route::group(['middleware' => 'jwt.auth'], function () {
    Route::post('logout', [AuthController::class, 'logout']);
    Route::get('users', [UserController::class, 'index']);
    Route::get('users/{id}', [UserController::class, 'show']);
    Route::put('users/{id}', [UserController::class, 'update']);
    Route::delete('users/{id}', [UserController::class, 'destroy']);
});