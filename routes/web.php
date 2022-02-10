<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Controller;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\UserController;
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
//Route::get('diagnostic/test', function () { return view('diagnos_test');})->name('test');
Route::get('diagnostic/test',[Controller::class, 'test'])->name('test');






Auth::routes();
Route::get('/home',[HomeController::class, 'index'])->name('home');
Route::get('/home/allDiagnostic',[HomeController::class, 'index'])->name('allDiagnostic');
Route::get('/home/allQuestion', [HomeController::class, 'question'])->name('allQuestion');
Route::get('/home/allUser', [HomeController::class, 'user'])->name('allUser');

//Route::get('/home/question/create', [HomeController::class, 'createQuestion'])->name('createQuestion');
//Route::post('/home/question/update', [HomeController::class, 'updateQuestion'])->name('updateQuestion');

/*Route::get('/home/user/create', [HomeController::class, 'createUser'])->name('createUser');
Route::post('/home/user/store', [HomeController::class, 'storeUser'])->name('storeUser');
Route::post('/home/user/update', [HomeController::class, 'updateUser'])->name('updateUser');
Route::get('/home/user/create', [HomeController::class, 'createUser'])->name('createUser');*/

Route::resource('/home/user', UserController::class);

Route::get('createCategorie', [Controller::class, 'createCategorie']);
Route::get('createRole', [Controller::class, 'createRole']);
Route::get('createSuperUser', [Controller::class, 'createSuperUser']);
Route::resource('question', QuestionController::class);
