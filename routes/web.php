<?php

use App\Models\Distrital;
use App\Models\Reina;
use Illuminate\Support\Facades\Auth;
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

Route::get('/', function () {
    $reinas = Distrital::inRandomOrder()->get();
    return view('welcome', compact('reinas'));
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/votacion', [App\Http\Controllers\VotacionController::class, 'index'])->name('votacion')->middleware('auth:web');
Route::get('/resultados', [App\Http\Controllers\ResultadoController::class, 'index'])->name('resultados')->middleware('auth:admin');

Route::get('/cultores/votacion', [App\Http\Controllers\CultoresController::class, 'index'])->name('votacion.cultores')->middleware('auth:web');
Route::get('/cultores/resultados', [App\Http\Controllers\CultoresResultadosController::class, 'index'])->name('resultados.cultores')->middleware('auth:admin');
