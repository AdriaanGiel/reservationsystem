<?php

use Routes\RouteGenerator;


// All Admin routes
RouteGenerator::generate('get','/',\Admin\AssignmentController::class,'@index')->name('admin');

RouteGenerator::generateResource('users',\Admin\UserController::class, ['as' => 'admin']);

RouteGenerator::generateResource('companies', \Admin\CompanyController::class, ['as' => 'admin','except' => 'show']);

RouteGenerator::generateResource('assignments',\Admin\AssignmentController::class, ['as' => 'admin']);

RouteGenerator::generate('post','assignments/{assignment}/judge',\Admin\AssignmentController::class, '@judgeAssignments');

