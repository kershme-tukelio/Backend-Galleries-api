<?php

use Illuminate\Http\Request;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\AuthController;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/galleries', [GalleryController::class, 'index']);
Route::post('/galleries', [GalleryController::class, 'store'])->middleware('auth:api');
Route::get('/galleries/{id}', [GalleryController::class, 'show']);
Route::get('/my-galleries', [GalleryController::class, 'getMyGalleries'])->middleware('auth:api');
Route::put('/galleries/{id}', [GalleryController::class, 'edit'])->middleware('auth:api');
Route::delete('/galleries/{id}', [GalleryController::class, 'destroy'])->middleware('auth:api');

Route::post('/galleries/{id}', [CommentController::class, 'store'])->middleware('auth:api');
Route::delete('/galleries/{id}', [CommentController::class, 'destroy'])->middleware('auth:api');

Route::post('/register', [AuthController::class, 'register'])->middleware('guest:api');
Route::post('/login', [AuthController::class, 'login'])->middleware('guest:api');
Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth:api');
Route::get('/me', [AuthController::class, 'me'])->middleware('auth:api');
Route::post('/refresh-token', [AuthController::class, 'refreshToken'])->middleware('auth:api');