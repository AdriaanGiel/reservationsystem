<?php

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

use Routes\RouteGenerator;

Route::get('/', function () {
    return view('home');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

RouteGenerator::generateResource('assignements',\Front\AssignmentController::class);

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
