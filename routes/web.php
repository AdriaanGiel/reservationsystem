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

// All front routes

Auth::routes();

Route::match(['get','post'],'register',function(){
    return redirect(route('login'));
});

//Route::get('test',function(){
//    $assignments = \App\Assignment::getByType('approved');
//    return $assignments;
//});
//
//Route::get('api/events',function(){
//  return \App\event::all();
//});
//
//Route::get('api/highscores',function(){
//    return \App\highscore::all()->sortby('points')->map(function($player){
//        unset($player->id);
//        return $player;
//    });
//});
//
//Route::post('api/higscores',function(Request $data){
//    $check = \App\highscore::all()->sortBy('points')->first();
//
//    if($data->input('points') > $check){
//        return \App\highscore::create($data->all());
//    }
//
//    return false;
//});


Route::get('/', 'HomeController@index')->name('home');
Route::get('/home', 'HomeController@index')->name('home.index');

Route::middleware('auth')->group(function(){
    routeGenerator::generate('get','user/profile',\Front\UserController::class,'@index')->name('user.profile');
    routeGenerator::generate('patch','user/profile',\Front\UserController::class,'@update')->name('user.profile.update');
    routeGenerator::generate('post','user/profile/password',\Front\UserController::class,'@passwordUpdate')->name('user.profile.password');

    RouteGenerator::generate('get','assignments/types',\Front\AssignmentController::class,'@allIndex')->name('assignment.types');
    RouteGenerator::generateResource('assignments',\Front\AssignmentController::class);
    RouteGenerator::generate('get','companies',\Front\CompanyController::class,'@index')->name('companies.index');

});
