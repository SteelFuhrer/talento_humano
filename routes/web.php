<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AusenciaController;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/ausencias', [AusenciaController::class, 'index'])->name('show_ausencias');
Route::get('/ausencias/create', [AusenciaController::class, 'create']);
Route::post('/ausencias/new', [AusenciaController::class, 'store'])->name('new_ausencia');
Route::get('/users/{user}/edit', [AusenciaController::class, 'edit'])->name('edit_ausencia');
Route::put('/users/{user}', [AusenciaController::class, 'update'])->name('update_ausencia'); 
