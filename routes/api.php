<?php

use Illuminate\Http\Request;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\CommentController;

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
Route::post('/galleries', [GalleryController::class, 'store']);
Route::get('/galleries/{id}', [GalleryController::class, 'show']);
Route::get('/my-galleries', [GalleryController::class, 'getMyGalleries']);
Route::put('/galleries/{id}', [GalleryController::class, 'edit']);
Route::delete('/galleries/{id}', [GalleryController::class, 'destroy']);

Route::post('/galleries/{id}', [CommentController::class, 'store']);
Route::delete('/galleries/{id}', [CommentController::class, 'destroy']);