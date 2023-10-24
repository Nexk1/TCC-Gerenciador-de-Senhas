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

Route::prefix('')->group(function(){
    Route::get('/', [TccController::class, 'index'])->name('tela-login');
    Route::get('/create',[TccController::class, 'create'])->name('cadastro-create');
    Route::post('/',[TccController::class, 'store'])->name('cadastro-store');
    Route::post('/laravel',[TccController::class, 'laravel'])->name('laravel');
});

Route::fallback(function(){
    return "Error!";
});