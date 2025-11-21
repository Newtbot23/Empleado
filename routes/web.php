<?php

use App\Http\Controllers\EmpleadoController;
use Illuminate\Support\Facades\Route;


Route::resource('empleado', EmpleadoController::class);
