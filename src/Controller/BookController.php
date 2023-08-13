<?php

namespace App\Controller;

use App\Kernel\AbstractController;
use App\Kernel\Response;
use App\Model\Repository\PageRepository;
use App\Service\BookService;

class BookController extends AbstractController
{
    public function listAction(array $params = [])
    {
        $books = BookService::getBookListInfo();

        return Response::render('books', $books);
    }

    public function pageAction(array $params = [])
    {
        $book = (int)$params[0];
        $page = (int)$params[1];
        $page = (new PageRepository())->getPage($book, $page);
        $pageList = (new PageRepository())->getPageList($book);

        return Response::render('page', [$page, $pageList]);
    }

    public function searchAction(array $params = [])
    {
        $book = (int)$params[0];
        $page = (int)$params[1];
        $page = (new PageRepository())->getPage($book, $page);
        $pageList = (new PageRepository())->getPageList($book);

        return Response::render('book/page', $page, $pageList);
    }

}