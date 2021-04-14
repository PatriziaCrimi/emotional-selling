<?php

use Illuminate\Support\Facades\Route;

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

// ------------------- PUBLIC ROUTES -------------------
// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', 'HomeController@index')->name('index');

// ------------------- AUTHENTICATION ROUTES -------------------
Auth::routes(['register' => false]);

Route::middleware('auth')->namespace('Logged')->prefix('logged')->name('logged.')->group(function(){
  Route::get('/', 'HomeController@index')->name('index');
  Route::get('/groups', 'GroupController@index')->name('groups');
});
