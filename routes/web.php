<?php

use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\MiCuentaController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\MenuController;
use App\Http\Controllers\Backend\MenuPerfilController;

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

Route::get('mi-cuenta', [MiCuentaController::class, 'index'])->middleware(['auth'])
    ->name('mi-cuenta.index');

Route::group(['prefix' => 'admin-backend', 'middleware' => ['auth', 'superadministrador']], function () {
    Route::get('', [DashboardController::class, 'index'])->name('dashboard');
    /* RUTAS DEL MENU */
    Route::get('menu', [MenuController::class, 'index'])->name('menu');
    Route::get('menu/crear', [MenuController::class, 'crear'])->name('menu.crear');
    Route::get('menu/{id}/editar', [MenuController::class, 'editar'])->name('menu.editar');
    Route::post('menu', [MenuController::class, 'guardar'])->name('menu.guardar');
    Route::post('menu/guardar-orden', [MenuController::class, 'guardarOrden'])->name('menu.orden');
    Route::put('menu/{id}', [MenuController::class, 'actualizar'])->name('menu.actualizar');
    Route::delete('menu/{id}/eliminar', [MenuController::class, 'eliminar'])->name('menu.eliminar');
    /* RUTAS DEL MENU PERFIL */
    Route::get('menu-perfil', [MenuPerfilController::class, 'index'])->name('menu-perfil');
    Route::post('menu-perfil', [MenuPerfilController::class, 'guardar'])->name('menu-perfil.guardar');
});
