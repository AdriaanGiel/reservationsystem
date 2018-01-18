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


Auth::routes();

Route::match(['get','post'],'register',function(){
    return redirect(route('login'));
});

Route::get('test',function(){

    $assignment = Auth::user()->assignments()->latest()->first();

    $check = "{$assignment->date}";
    $check2 = "{$assignment->start_time}";

    $date = \Carbon\Carbon::createFromFormat('Y-m-d',$check);
    $time = \Carbon\Carbon::createFromFormat('H:m:s',$check2);


    $l = $time->addHour((int)$assignment->hours);


    $l = \Carbon\Carbon::createFromFormat('Y-m-d H:m:s',"{$date->toDateString()} {$time->toTimeString()}");


    $assignment->title = $assignment->company->name;
    $assignment->formatted_date = $date->toFormattedDateString();
    $assignment->start = $date->toDateTimeString();


    $assignment->end = $date->addHours(\Carbon\Carbon::createFromFormat("H",round($assignment->hours))->toTimeString())->toDateTimeString();
    $assignment->color = '#F13385';

    dd($assignment);

});

Route::get('/', 'HomeController@index')->name('home');
Route::get('/home', 'HomeController@index')->name('home.index');

Route::middleware('auth')->group(function(){
    routeGenerator::generate('get','user/profile',\Front\UserController::class,'@index')->name('user.profile');
    routeGenerator::generate('patch','user/profile',\Front\UserController::class,'@update')->name('user.profile.update');
    routeGenerator::generate('post','user/profile/password',\Front\UserController::class,'@passwordUpdate')->name('user.profile.password');

    RouteGenerator::generateResource('assignments',\Front\AssignmentController::class);
    RouteGenerator::generate('get','companies',\Front\CompanyController::class,'@index')->name('companies.index');

});
