<?php

use App\Http\Controllers\ProspectController;
use App\Http\Controllers\VenteController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\ClientController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('/prospects', ProspectController::class);
Route::resource('/ventes',  VenteController::class);
Route::resource('/messages',  MessageController::class);
Route::resource('/client',  ClientController::class);
