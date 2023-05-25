<?php

use Controllers\RegisterController;
use Core\Router\Route;


Route::get('/sign-up/', [RegisterController::class, 'show']);
