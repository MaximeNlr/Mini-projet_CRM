<?php

use App\Http\Controllers\ProspectController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\VenteController;
use App\Http\Controllers\MessageController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('/prospects', ProspectController::class);
Route::resource('/clients', ClientController::class);
Route::resource('/ventes', VenteController::class);
Route::resource('/messages', MessageController::class);


