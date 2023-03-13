<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
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

Route::get('product',[ ProductController::class, 'list']);
Route::get('product/{id}',[ ProductController::class, 'show']);
Route::post('product',[ ProductController::class, 'store']);
Route::put('product/{id}',[ ProductController::class, 'update']);
Route::delete('product/delete/{id}',[ ProductController::class, 'destroy']);

Route::get('category',[ CategoryController::class, 'list']);
Route::get('category/{id}',[ CategoryController::class, 'detail']);
Route::post('category',[ CategoryController::class, 'store']);
Route::put('category/{id}',[ CategoryController::class, 'update']);
Route::delete('category/delete/{id}',[ CategoryController::class, 'destroy']);



Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


