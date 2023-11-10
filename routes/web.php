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