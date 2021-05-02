<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\StatesController;
use App\Http\Controllers\LaboratoriesController;
use App\Http\Controllers\Health_infosController;
use App\Http\Controllers\TestsController;
use App\Http\Controllers\VaccinesController;
use App\Http\Controllers\ContactsController;



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

// Route::get('/', [PagesController::class, 'index']);
// or
Route::get('/','App\Http\Controllers\PagesController@index');

Route::get('/about','App\Http\Controllers\PagesController@about');

Route::get('/services', [PagesController::class, 'services']);

// route resources

Route::resource('states','App\Http\Controllers\StatesController');

Route::resource('laboratory','App\Http\Controllers\LaboratoriesController');

Route::resource('info_me','App\Http\Controllers\Health_infosController');

Route::resource('tests','App\Http\Controllers\TestsController');

Route::resource('vaccines','App\Http\Controllers\VaccinesController');

Route::resource('contact','App\Http\Controllers\ContactsController');



Auth::routes();

Route::get('/dashboard', [App\Http\Controllers\DashboardController::class, 'index']);
