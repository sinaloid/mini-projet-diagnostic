<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Controller;
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


Route::get('/', function () { return view('welcome');})->name('acceuil');
Route::get('ensavoir', function () { return view('ensavoir');})->name('ensavoir');
Route::get('apropos', function () { return view('apropos');})->name('apropos');
Route::get('diagnostic', function () { return view('diagnostic');})->name('diagnostic');
Route::get('diagnostic/test', function () { return view('diagnos_test');})->name('test');






Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
