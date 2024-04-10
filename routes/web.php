<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProspectController;
use App\Http\Controllers\VenteController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\ClientController;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware('auth')->group(function() {
    Route::resource('/prospects', ProspectController::class);
    Route::resource('/ventes',  VenteController::class);
    Route::resource('/messages',  MessageController::class);
    Route::resource('/clients',  ClientController::class);
    Route::get('/clients/create/{prospect}', [ClientController::class, 'create'])->name('clients.create');
    Route::get('/deconnexion', [AuthController::class, 'deconnexion'])->name('deconnexion');
});


Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class, 'authenticate'])->name('auth');
Route::get('/register', [AuthController::class, 'create'])->name('register.create');
Route::post('/register', [AuthController::class, 'store'])->name('user.store');


Route::get('/inscription', function (Request $request) {
    dd($request);
    echo "Register Page";
});