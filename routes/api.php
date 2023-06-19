<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BlogPostController;
use App\Http\Controllers\CommentsController;
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


//Category
Route::post('category', [CategoryController::class, 'store']);

Route::get('category/index',[CategoryController::class,'index']);
Route::get('category/{id}/edit',[CategoryController::class,'edit'])->name('category.edit');
Route::get('category/create', [CategoryController::class,'create']);
Route::post('category/store',[CategoryController::class,'store']);
Route::get('category/{id}/show',[CategoryController::class,'show']);
Route::put('category/{id}/update',[CategoryController::class,'update']);
Route::delete('/category/{id}', [CategoryController::class, 'destroy']);

//User

Route::post('login', [AuthController::class, 'login']);
Route::post('users', [UserController::class, 'store']);


Route::group(['middleware' => 'jwt.auth'], function () {
    Route::post('logout', [AuthController::class, 'logout']);
    Route::get('users', [UserController::class, 'index']);
    Route::get('users/{id}', [UserController::class, 'show']);
    Route::put('users/{id}', [UserController::class, 'update']);
    Route::delete('users/{id}', [UserController::class, 'destroy']);
});

// Blog Post

Route::post('post', [BlogPostController::class, 'store']);
Route::get('post/{id}/show',[BlogPostController::class,'show']);
Route::put('post/{id}/update',[BlogPostController::class,'update']);
Route::delete('/post/{id}', [BlogPostController::class, 'destroy']);
Route::get('post/index',[BlogPostController::class,'index']);


//comments

Route::post('comment', [CommentsController::class, 'store']);
Route::get('comment/{id}/show',[CommentsController::class,'show']);
Route::put('comment/{id}/update',[CommentsController::class,'update']);
Route::get('comment/index',[CommentsController::class,'index']);
Route::delete('/comment/{id}', [CommentsController::class, 'destroy']);
