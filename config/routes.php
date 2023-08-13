<?php

use App\Controller\AuthorController;
use App\Controller\BookController;
use App\Controller\HomeController;
use App\Kernel\Request;
use App\Kernel\Router;

return function (Router $router) {
    $router
        ->add('/', Request::GET, HomeController::class, 'menuAction')
        ->add('/book/list', Request::GET, BookController::class, 'listAction')
        ->add('/book/%d', Request::GET, BookController::class, 'itemAction')
        ->add('/book/%d/page/%d', Request::GET, BookController::class, 'pageAction')
        ->add('/book/search', Request::GET, AuthorController::class, 'listAction');
};