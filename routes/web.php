<?php

use App\Http\Controllers\TccController;
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

// Route::get('/', function () {
//     return view('welcome');
// });


// Route::get('/', [TccController::class, 'index']);

Route::middleware(['web'])->group(function(){
    Route::get('/', [TccController::class, 'index'])->name('tela-login');
    Route::get('/cadastro',[TccController::class, 'create'])->name('cadastro-create');
    Route::get('/User/{page_id}',[TccController::class, 'login'])->name('login');
    Route::get('/User/{page_id}/addpass', [TccController::class, 'add_sen'])->name('add_pass');
    Route::get('/esqueci-a-senha',[TccController::class, 'esqueceu_senha'])->name('esqueci-a-senha');
    Route::get('/User/{page_id}/notas', [TccController::class, 'notas_seguras'])->name('notas_seguras');
    Route::get('/esqueci-a-senha/rec',[TccController::class, 'recuperar_senha'])->name('recuperar_senha');
    Route::get('/esqueci-a-senha/rec/{valor_aleatorio}/{email}',[TccController::class, 'new_pass'])->name('nova_senha');
    

    Route::post('/esqueci-a-senha/rec/{valor_aleatorio}/{email}/new-pass',[TccController::class, 'new_pass_store'])->name('nova_senha_store');
    Route::post('/esqueci-a-senha/rec/{valor_aleatorio}/{email}',[TccController::class, 'recuperar_senha_store'])->name('recuperar_senha_store');
    Route::post('/esqueci-a-senha',[TccController::class, 'esqueceu_senha_store'])->name('esqueci-a-senha-store');
    Route::post('/User/{page_id}/notas', [TccController::class, 'add_notas'])->name('add_nota_store');
    Route::post('/User/{page_id}/addpass', [TccController::class, 'add_sen_store'])->name('add_pass_store');
    Route::post('/cadastro',[TccController::class, 'store'])->name('cadastro-store');
    Route::post('/User',[TccController::class, 'login_process'])->name('login-store');
    Route::post('/laravel',[TccController::class, 'laravel'])->name('laravel');
});


// Route::prefix('')->group(function(){
//     Route::get('/', [TccController::class, 'index'])->name('tela-login');
//     Route::get('/create',[TccController::class, 'create'])->name('cadastro-create');
//     // Route::get('/User',[TccController::class, 'login'])->name('login');
//     Route::get('/esqueci-a-senha',[TccController::class, 'esqueceu_senha'])->name('esqueci-a-senha');
//     Route::post('/cadastro',[TccController::class, 'store'])->name('cadastro-store');
//     Route::post('/User',[TccController::class, 'login_process'])->name('login-store');
//     Route::post('/laravel',[TccController::class, 'laravel'])->name('laravel');
// });

Route::fallback(function(){
    return "Error!";
});