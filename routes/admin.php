<?php

use Routes\RouteGenerator;



RouteGenerator::generate('get','/',\Admin\AssignmentController::class,'@index')->name('admin');
RouteGenerator::generateResource('users',\Admin\UserController::class, ['as' => 'admin']);
RouteGenerator::generateResource('companies', \Admin\CompanyController::class, ['as' => 'admin']);
RouteGenerator::generateResource('assignments',\Admin\AssignmentController::class, ['as' => 'admin']);

// Role controller to assign users new role