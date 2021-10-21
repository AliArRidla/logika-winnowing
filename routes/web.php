<?php

use App\Http\Controllers\AppController;
use App\Http\Controllers\CompareTextController;
use App\Http\Controllers\CompareFilePDFController;
use Illuminate\Support\Facades\Route;
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

Route::get('/about', function () {
    return view('about');
});

Route::resource('compare-text', CompareTextController::class);
Route::resource('compare-pdf', CompareFilePDFController::class);


// Route::get('/', [AppController::class,'index']);
// Route::get('/', [AppController::class,'textGet']);
// Route::post('/', [AppController::class,'text']);
// Route::get('/pdf', [AppController::class,'index']);
// Route::post('/pdf', [AppController::class,'pdf']);

