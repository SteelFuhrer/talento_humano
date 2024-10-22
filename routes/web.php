<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AusenciaController;
use App\Http\Controllers\EmpleadoController;
use App\Http\Controllers\CtipoesController;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('ausencias', AusenciaController::class);
Route::resource('empleados', EmpleadoController::class);

Route::resource('ctipoes', CtipoesController::class);
