<?php

namespace App\Controller;

use App\Kernel\AbstractController;
use App\Kernel\Response;
use App\Model\Repository\PageRepository;
use App\Service\BookService;

class BookController extends AbstractController
{
    public function listAction(array $params = []): Response
    {
        $books = BookService::getBookListInfo();

        return Response::render('books', $books);
    }

    public function pageAction(array $params = []): Response
    {
        $book = (int)$params[1];
        $currentPage = (int)$params[2];
        $page = (new PageRepository())->getPage($book, $currentPage);
        $pageList = (new PageRepository())->getPageList($book);

        return Response::render('page', [$book, $currentPage, $page, $pageList]);
    }

    public function searchAction(array $params = [], array $getParams = []): Response
    {
        $bookName = $getParams['book'] ?? false;
        $authorName = $getParams['author'] ?? false;
        $books = BookService::getBookSearchInfo($bookName, $authorName);

        return Response::render('books', $books);
    }

}