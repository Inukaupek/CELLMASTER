<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\api\CustomerController;
use App\Http\Controllers\api\OrderController;


Route::post('auth/register',[CustomerController::class, 'register']);
Route::post('/auth/login',[CustomerController::class, 'login']);

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::post('/auth/order',[OrderController::class, 'store'])->middleware('auth:sanctum');
