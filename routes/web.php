<?php

// use App\Http\Controllers\AppController;
use App\Http\Controllers\CompareEssayController;
use App\Http\Controllers\CompareTextController;
use App\Http\Controllers\CompareFilePDFController;
use App\Http\Controllers\TambahUlanganController;
use App\Http\Controllers\KerjakanUlanganController;
use App\Http\Controllers\HomeController;
// use App\Http\Controllers\CustomAuthController;
// use Illuminate\Support\Facades\Route;
use Smalot\PdfParser\Parser;

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
    return view('winnowing');
});

// Route::get('/about', function () {
//     return view('about');
// });
Auth::routes();
Route::resource('home', HomeController::class);
Route::resource('compare-text', CompareTextController::class);
Route::resource('compare-pdf', CompareFilePDFController::class);
Route::resource('compare-essay', CompareEssayController::class);

Route::resource('tambah-soal', TambahUlanganController::class);
Route::resource('kerjakan-soal', KerjakanUlanganController::class);
// Route::post('tambah-soal', TambahUlanganController::class, 'store');




