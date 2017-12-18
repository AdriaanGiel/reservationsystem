<?php

use Routes\RouteGenerator;


RouteGenerator::generateResource('users',\Admin\UserController::class);
RouteGenerator::generateResource('companies', \Admin\CompanyController::class);
RouteGenerator::generateResource('Assignments',\Admin\AssignmentController::class);

// Role controller to assign users new role