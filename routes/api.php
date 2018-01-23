<?php

use Illuminate\Http\Request;
use Routes\RouteGenerator;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::middleware(['auth'])->group(function(){
    RouteGenerator::generate('post','userdata',\Front\UserController::class,'@getUserData');
    RouteGenerator::generate('get','assignments/calendardata',\Front\AssignmentController::class,'@getCalendarData');
    RouteGenerator::generate('get','assignments/{type}',\Front\AssignmentController::class,'@getAssignmentsByType');
    RouteGenerator::generate('post','companies',\Front\CompanyController::class,'@getCompanies');
    RouteGenerator::generate('post','validate/assignment',\Front\AssignmentController::class,'@validateAssignment');
});


Route::middleware(['admin'])->prefix('admin')->group(function(){

    RouteGenerator::generate('get','assignments',\Admin\AssignmentController::class,'@getAssignments');
    RouteGenerator::generate('post','users',\Admin\UserController::class,'@getUsers');
    RouteGenerator::generate('post','validate/company',\Admin\CompanyController::class,'@validateCompany');
    RouteGenerator::generate('post','validate/assignment',\Admin\AssignmentController::class,'@validateAssignment');
});