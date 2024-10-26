<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AusenciaController;
use App\Http\Controllers\CmotivopaseController;
use App\Http\Controllers\EmpleadoController;
use App\Http\Controllers\CtipoesController;
use App\Http\Controllers\CtiporetrasoController;
use App\Http\Controllers\DepartamentoController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('ausencias', AusenciaController::class);
Route::resource('empleados', EmpleadoController::class);
Route::resource('cmotivopases',CmotivopaseController::class);
Route::resource('ctipoes', CtipoesController::class);
Route::resource('ctiporetraso', CtiporetrasoController::class);
Route::resource('departamento', DepartamentoController::class);


