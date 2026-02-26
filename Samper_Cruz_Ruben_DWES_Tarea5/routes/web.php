<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AbonosController;
use App\Http\Controllers\UsuariosController;



// Route::get('/', function () {
//     return view('welcome');
// });


Route::get('/',[AbonosController::class, 'index'])->name('abonos.index');
Route::get('/abonos/index',[AbonosController::class, 'index'])->name('abonos.index');

Route::get('/abonos/create',[AbonosController::class, 'create'])->name('abonos.create');
Route::post('/abonos/store',[AbonosController::class, 'store'])->name('abonos.store'); //post cuando haces un insert, store esta validando el formulario

Route::get('/abonos/show/{id}',[AbonosController::class, 'show'])->name('abonos.show');
Route::get('/abonos/{id}', [AbonosController::class, 'show'])->name('abonos.show');


Route::get('/usuarios/login', [UsuariosController::class, 'login'])->name('usuarios.login');
Route::post('/usuarios/loginValidation', [UsuariosController::class, 'loginValidation'])->name('usuarios.loginValidation');
Route::get('/usuarios/logout', [UsuariosController::class, 'logout'])->name('usuarios.logout');



// Route::get('/abonos/edit/{id}',[AbonosController::class, 'edit'])->name('abonos.edit');
// Route::put('/abonos/update/{id}',[AbonosController::class, 'update'])->name('abonos.update'); //put cuando haces un update, tambien puedo usar post

// Route::get('/abonos/destroy/{id}',[AbonosController::class, 'destroy'])->name('abonos.destroy'); //creo que en este get deberia de ir delete o desstroy
