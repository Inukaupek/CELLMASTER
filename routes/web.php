<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;



Route::post('/register',[UserController::class,'register']);


Route::get('/', function () {
    return view('auth.login');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
