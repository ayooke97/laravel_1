<?php

use App\Http\Controllers\SiswaController;

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
    return view('template');
});

Route::get('/test', function () {
    return view('test');
});

Route::get('/main', function () {
    return view('main');
});

// Route::resource('mhs', SiswaController::class)->names('siswa');
Route::resource('siswa', SiswaController::class)->names('siswa');
// Route::get('/siswa', [SiswaController::class, 'index']);




