<?php

namespace App\Controller;

use App\Kernel\AbstractController;
use App\Kernel\Response;

class HomeController extends AbstractController
{
    public function menuAction()
    {
        return Response::render('menu');
    }
}