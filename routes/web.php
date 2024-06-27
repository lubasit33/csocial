<?php

use App\Http\Controllers\AssociadoController;
use App\Http\Controllers\AvalistaController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\ContaController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\MovimentoController;

Route::view('/', 'app.welcome');

Route::group(['middleware' => ['auth']], function() {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::group(['prefix' => 'user', 'as' => 'user.'], function() {
        Route::get('/profile', [UserController::class, 'profile'])->name('profile');
        Route::put('/{id}', [UserController::class, 'profileUpdate'])->name('update');
        Route::get('/password', [UserController::class, 'password'])->name('password');
        Route::patch('/{id}', [UserController::class, 'passwordUpdate'])->name('password.update');
    });

    Route::group(['prefix' => 'associado', 'as' => 'associado.'], function() {
        Route::get('/', [AssociadoController::class, 'index'])->name('index');
        Route::get('/create', [AssociadoController::class, 'create'])->name('create');
        Route::post('/', [AssociadoController::class, 'store'])->name('store');
        // Route::get('/{id}', [AssociadoController::class, 'show'])->name('show');
        Route::get('/{id}/edit', [AssociadoController::class, 'edit'])->name('edit');
        Route::put('/{id}', [AssociadoController::class, 'update'])->name('update');
        Route::delete('/{id}', [AssociadoController::class, 'destroy'])->name('destroy');
    });

    Route::group(['prefix' => 'avalista', 'as' => 'avalista.'], function() {
        Route::get('/', [AvalistaController::class, 'index'])->name('index');
        Route::get('/create', [AvalistaController::class, 'create'])->name('create');
        Route::post('/', [AvalistaController::class, 'store'])->name('store');
        // Route::get('/{id}', [AvalistaController::class, 'show'])->name('show');
        Route::get('/{id}/edit', [AvalistaController::class, 'edit'])->name('edit');
        Route::put('/{id}', [AvalistaController::class, 'update'])->name('update');
        Route::delete('/{id}', [AvalistaController::class, 'destroy'])->name('destroy');
    });

    Route::group(['prefix' => 'conta', 'as' => 'conta.'], function() {
        Route::get('/', [ContaController::class, 'index'])->name('index');
        Route::get('/create', [ContaController::class, 'create'])->name('create');
        Route::post('/', [ContaController::class, 'store'])->name('store');
        // Route::get('/{id}', [ContaController::class, 'show'])->name('show');
        Route::get('/{id}/edit', [ContaController::class, 'edit'])->name('edit');
        Route::put('/{id}', [ContaController::class, 'update'])->name('update');
        Route::delete('/{id}', [ContaController::class, 'destroy'])->name('destroy');
    });

    Route::group(['prefix' => 'movimento', 'as' => 'movimento.'], function() {
        Route::get('/', [MovimentoController::class, 'index'])->name('index');
        Route::get('/create', [MovimentoController::class, 'create'])->name('create');
        Route::post('/', [MovimentoController::class, 'store'])->name('store');
        // Route::get('/{id}', [MovimentoController::class, 'show'])->name('show');
        Route::get('/{id}/edit', [MovimentoController::class, 'edit'])->name('edit');
        Route::put('/{id}', [MovimentoController::class, 'update'])->name('update');
        Route::delete('/{id}', [MovimentoController::class, 'destroy'])->name('destroy');
    });

    Route::group(['prefix' => 'categoria', 'as' => 'categoria.'], function() {
        Route::get('/', [CategoriaController::class, 'index'])->name('index');
        Route::get('/create', [CategoriaController::class, 'create'])->name('create');
        Route::post('/', [CategoriaController::class, 'store'])->name('store');
        // Route::get('/{id}', [CategoriaController::class, 'show'])->name('show');
        Route::get('/{id}/edit', [CategoriaController::class, 'edit'])->name('edit');
        Route::put('/{id}', [CategoriaController::class, 'update'])->name('update');
        Route::delete('/{id}', [CategoriaController::class, 'destroy'])->name('destroy');
    });
});

require __DIR__.'/auth.php';
