<?php

use App\Controller\BookController;
use App\Controller\HomeController;
use App\Kernel\Router;

return function (Router $router) {
    $router
        ->addGet('', HomeController::class, 'menuAction')
        ->addGet('book/list', BookController::class, 'listAction')
        ->addGet('page/\d', BookController::class, 'pageAction')
        ->addGet('search', BookController::class, 'searchAction');
};