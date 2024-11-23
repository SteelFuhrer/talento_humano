<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AusenciaController;
use App\Http\Controllers\CmotivopaseController;
use App\Http\Controllers\EmpleadoController;
use App\Http\Controllers\CtipoesController;
use App\Http\Controllers\CtiporetrasoController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\EmpleadoAusenciaController;
use App\Http\Controllers\DepartamentoController;
use App\Http\Controllers\EntradasalidaController;
use App\Http\Controllers\HorarioController;
use App\Http\Controllers\TrabextralaboralController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HorarioAsignadoController;
use App\Http\Controllers\RetrasoController;
use App\Http\Controllers\PaseEmpleadoController;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('register', [RegisterController::class, 'showRegistrationForm'])->middleware('can:ausencias.index')->name('register');

Route::resource('ausencias', AusenciaController::class)->middleware('can:ausencias.index');
Route::resource('empleados', EmpleadoController::class)->middleware('can:empleados.index');
Route::resource('cmotivopases', CmotivopaseController::class)->middleware('can:ausencias.index');
Route::resource('ctipoes', CtipoesController::class)->middleware('can:ausencias.index');
Route::resource('ctiporetraso', CtiporetrasoController::class)->middleware('can:ausencias.index');
Route::resource('departamento', DepartamentoController::class)->middleware('can:ausencias.index');
Route::resource('horarios', HorarioController::class)->middleware('can:ausencias.index');
Route::resource('trabextralaboral', TrabextralaboralController::class);
Route::resource('horarioasignado', HorarioAsignadoController::class);
Route::resource('paseempleado', PaseEmpleadoController::class);
Route::resource('horarioasignado', HorarioAsignadoController::class)->middleware('can:empleados.index');
<<<<<<< HEAD

Route::get('/empleadoausencia', [EmpleadoAusenciaController::class, 'index'])->name('empleadoausencia.index');
Route::get('/empleadoausencia/create', [EmpleadoAusenciaController::class, 'create'])->name('empleadoausencia.create');
Route::post('/empleadoausencia', [EmpleadoAusenciaController::class, 'store'])->name('empleadoausencia.store');

Route::get('/empleadoausencia/{IdEmpleadoAusencia}/edit', [EmpleadoAusenciaController::class, 'edit'])->name('empleadoausencia.edit');

Route::put('/empleadoausencia/{IdEmpleadoAusencia}', [EmpleadoAusenciaController::class, 'update'])->name('empleadoausencia.update');

Route::delete('/empleadoausencia/{empleadoAusencia}', [EmpleadoAusenciaController::class, 'destroy'])->name('empleadoausencia.destroy');
Route::put('/empleadoausencia/approve', [EmpleadoAusenciaController::class, 'approve'])->name('empleadoausencia.approve');

Route::get('/users/{user}', [UserController::class, 'rol'])->middleware('can:ausencias.index')->name('users.rol');
Route::put('/users/{user}', [UserController::class, 'rol_update'])->middleware('can:ausencias.index')->name('users.rol_update');

Route::get('/asistencia', [EntradasalidaController::class, 'showAsistenciaForm'])->name('asistencia.form');
Route::resource('users', UserController::class)->middleware('can:ausencias.index');
Route::get('/configuracion/{user}', [UserController::class, 'config'])->name('configuracion');
Route::put('/configuracion/{user}', [UserController::class, 'config_update'])->name('update_user');

Route::get('/users/{user}', [UserController::class, 'rol'])->middleware('can:ausencias.index')->name('users.rol');
Route::put('/users/{user}', [UserController::class, 'rol_update'])->middleware('can:ausencias.index')->name('users.rol_update');
//ruta para el dashboard
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

//Route::get('/asistencia', [EntradasalidaController::class,'showAsistenciaForm'])->name('asistencia.form');
//Route::post('/asistencia', [EntradasalidaController::class, 'registrarAsistencia'])->name('asistencia.registrar');
Route::resource('retraso', RetrasoController::class);
