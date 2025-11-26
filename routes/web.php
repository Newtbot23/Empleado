<?php

use App\Http\Controllers\EmpleadoController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;


Route::get('/', function () {
    return view('auth.login');
});

Route::resource('empleado', EmpleadoController::class);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// cuando el empleado se logue busca un controlador y busca la clase del index para ejecutarla
Route::group(['middleware' => 'auth'], function () {
    Route::get('/',[EmpleadoController::class, 'index'])->name('home ');
}); 

Route::resource('empleados', EmpleadoController::class)->middleware('auth');
