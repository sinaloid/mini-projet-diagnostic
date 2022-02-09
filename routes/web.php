<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Controller;
use App\Http\Controllers\HomeController;
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
Route::get('/home/list_diagnostic', function () { return view('home');})->name('list_diagnostic');
Route::get('/home/question', function () { return view('home');})->name('question');
Route::get('/home/user', function () { return view('home');})->name('user');

Route::get('/home/question/create', [HomeController::class, 'createQuestion'])->name('createQuestion');
Route::get('/home/question/update', [HomeController::class, 'updateQuestion'])->name('updateQuestion');
Route::get('/home/user/create', [HomeController::class, 'createUser'])->name('createUser');
Route::get('/home/user/update', [HomeController::class, 'updateUser'])->name('updateUser');

Route::get('/home', [HomeController::class, 'index'])->name('home');
