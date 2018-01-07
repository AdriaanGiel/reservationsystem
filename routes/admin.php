<?php

use Routes\RouteGenerator;


RouteGenerator::generateResource('users',\Admin\UserController::class);
RouteGenerator::generateResource('companies', \Admin\CompanyController::class);
RouteGenerator::generateResource('assignments',\Admin\AssignmentController::class);

// Role controller to assign users new role