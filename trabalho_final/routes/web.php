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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('templates.middleware')->with('titulo', "");
})->middleware(['auth'])->name('dashboard');

Route::resource('ferramentas', 'FerramentaController')
    ->middleware(['auth']);

Route::resource('funcionarios', 'FuncionarioController')
    ->middleware(['auth']);

Route::resource('emprestimos', 'EmprestimoController')
    ->middleware((['auth']));

require __DIR__.'/auth.php';
