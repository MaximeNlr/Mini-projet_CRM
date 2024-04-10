<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\prospectController;
use App\Http\Controllers\VenteController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\ClientController;
use GuzzleHttp\Psr7\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::resource('/prospects', ProspectController::class);
Route::resource('/ventes', VenteController::class);
Route::resource('/messages', MessageController::class);
Route::resource('/clients', ClientController::class);

Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class, 'authenticate'])->name('auth');
Route::get('/register', [AuthController::class, 'register'])->name('register');
Route::post('/register', [AuthController::class, 'store'])->name('user.store');

Route::get('/inscription', function (Request $request) {
    dd($request);
    echo "Register Page";
});

