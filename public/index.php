<?php

use App\Kernel\Application;
use App\Kernel\Request;

require __DIR__ . '/../vendor/autoload.php';


$application = Application::init(
    __DIR__ . '/../config/routes.php',
    __DIR__ . '/../config/db.php'
);

$request = Request::createFromGlobals();
$response = $application->handleRequest($request);
$response->send();