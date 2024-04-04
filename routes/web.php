<?php

use App\Http\Controllers\prospectController;
use App\Http\Controllers\VenteController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\ClientController;
use Illuminate\Support\Facades\Route;

Route::resource('/prospects', ProspectController::class);
Route::resource('/ventes', VenteController::class);
Route::resource('/messages', MessageController::class);
Route::resource('/clients', ClientController::class);

