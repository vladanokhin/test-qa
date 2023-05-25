<?php

use Core\App\Web;
use Core\Request\Request;
use Core\App\App;

define('APP_DIR', dirname(__FILE__));

require_once ('vendor/autoload.php');

// Create app instance
$app = new App();

// Create request instance
$request = new Request();

$routers = new Web($app, $request);


