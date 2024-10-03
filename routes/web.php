<?php

use App\Http\Controllers\CardapioController;
use App\Http\Controllers\ComandaController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProdutosController;
use App\Http\Controllers\UsuariosController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [HomeController::class, 'index']);

Route::controller(LoginController::class)->group(function() {
    Route::get('/login', 'index')->name('login.index');
    Route::post('/login', 'store')->name('login.store');
    Route::post('/logout', 'destroy')->name('login.destroy');
});

Route::controller(ComandaController::class)->group(function() {
    Route::get('/comanda', 'index')->name('comanda');
    Route::post('/comanda', 'store')->name('comanda.store');
    Route::get('/cozinha', 'cozinha')->name('comanda.cozinha');
    Route::post('/pagar', 'pagarComanda')->name('comanda.pagar');
});

Route::controller(CardapioController::class)->group(function() {
    Route::get('/cardapio', 'index')->name('cardapio');
});

Route::controller(DashboardController::class)->group(function() {
    Route::get('/dashboard', 'index')->name('dashboard');
});

Route::controller(ProdutosController::class)->group(function() {
    Route::get('/produtos', 'index')->name('produtos');
    Route::post('/produtos', 'store')->name('produtos.cadastrar');
});

Route::controller(UsuariosController::class)->group(function() {
    Route::get('/usuarios', 'index')->name('usuarios.index');
    Route::post('/usuarios', 'register')->name('usuarios.register');
});