<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\VGAController;
use App\Http\Controllers\KriteriaController;
use App\Http\Controllers\HasilController;
use App\Http\Controllers\PrintController;

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
    return view('home', [
        'active' => 'home',
    ]);
})->middleware('auth');

Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);


Route::get('/register', [RegisterController::class, 'index'])->middleware('guest');
Route::post('/register', [RegisterController::class, 'store']);

Route::resource('/vga', VGAController::class)->middleware('auth');
// Route::resource('/dashboard/posts', DashboardPostController::class)->middleware('auth');

Route::get('/kriteria', [KriteriaController::class, 'index'])->middleware('auth');

Route::get('/hasil', [HasilController::class, 'index'])->middleware('auth');
Route::post('/hasil/perangkingan', [HasilController::class, 'hasil'])->middleware('auth');

Route::post('print', [PrintController::class, 'index'])->middleware('auth');
