<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use App\Http\Controllers\EquipamentoController;
use App\Http\Controllers\RegistroController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RotasController;

Route::get('/', [RotasController::class, 'home'])->name('home');

// --------------------Area de Suporte--------------------

Route::get('/suporte', [RotasController::class, 'suporte'])->name('suporte');

Route::get('/suporte/ListaEquipamentos', [RotasController::class, 'indexEquipamento'])->name('suporteListaEquipamentos');

Route::get('/suporte/ListaManutencoes', [RotasController::class, 'indexRegistro'])->name('suporteManutencaoEquipamentos');

// --------------------Area de Administrativa--------------------

Route::get('/administrativa', [RotasController::class, 'administrativa'])->name('administrativa')->middleware('auth');

Route::get('/administrativa/manutencao', [RotasController::Class, 'indexManutencao'])->name('administrativaManutencao')->middleware('auth');

Route::resource('/administrativa/registros', RegistroController::Class)->middleware('auth');

Route::resource('/administrativa/equipamentos', EquipamentoController::Class)->middleware('auth');

Route::resource('/administrativa/users', UserController::Class)->middleware('auth');






Route::get('/equipamento', [EquipamentoController::class, 'index'])->name('equipamento');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
