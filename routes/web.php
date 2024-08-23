<?php

use App\Http\Controllers\AreasController;
use App\Http\Controllers\CategoriasController;
use App\Http\Controllers\Os_gestaoController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Os_ufesController;
use App\Http\Controllers\StatusController;
use App\Http\Controllers\UsuariosController;
use App\Http\Controllers\AuthController;

Route::get('login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('login', [AuthController::class, 'login']);
Route::post('logout', [AuthController::class, 'logout'])->name('logout');

Route::get('usuarios/create', [UsuariosController::class, 'create'])->name('usuarios.create');
Route::post('usuarios', [UsuariosController::class, 'store'])->name('usuarios.store');


Route::middleware('auth')->group(function () {
    Route::resource('os_ufes', Os_ufesController::class);
    Route::resource('os_gestao', Os_gestaoController::class);
 
    Route::resource('status', StatusController::class);
    Route::resource('areas', AreasController::class);
    Route::resource('categorias', CategoriasController::class);

    Route::get('/import', [Os_ufesController::class, 'showImportForm'])->name('import');

    // Rota para processar o envio do formulário
    Route::post('/import', [Os_ufesController::class, 'import'])->name('import');
});



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

Route::get('/', function () {
    return view('welcome');
});
