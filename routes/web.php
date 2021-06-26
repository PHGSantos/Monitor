<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PainelController;
use App\Http\Controllers\WebpageController;
use App\Http\Controllers\UserController;

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

Route::get('/', [PainelController::class, 'index'])->name('site.painel');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/cadastro', [App\Http\Controllers\HomeController::class, 'cadastro'])->name('cadastro');

Route::get('/notificacoes', [App\Http\Controllers\HomeController::class, 'notificar_usuario'])->name('notificar');

Route::post('/add_site', [App\Http\Controllers\HomeController::class, 'add_site']);

Route::put('/att_site/{id}', [App\Http\Controllers\WebpageController::class, 'atualizar'])->name('atualizar');

Route::get('/edit_site/{id}', [App\Http\Controllers\WebpageController::class, 'editar'])->name('editar');

Route::get('/delete_site/{id}', [App\Http\Controllers\WebpageController::class, 'deletar'])->name('deletar');

Route::get('/notify_user', [App\Http\Controllers\UserController::class, 'notify_user'])->name('notify_user');

