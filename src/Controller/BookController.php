<?php

namespace App\Controller;

use App\Kernel\AbstractController;
use App\Kernel\Response;
use App\Model\Repository\BookRepository;

class BookController extends AbstractController
{
    public function listAction(array $params = [])
    {
        $books = (new BookRepository())->getAllBooks();
        $authors = (new AuthorRepository())->getAllBooks();

        return Response::render('books', $books);
    }

    public function itemAction(array $params = [])
    {
        $book = (new BookRepository())->getBook((int)$params[0]);
        $author = (new BookRepository())->getBook((int)$params[0]);

        return Response::render('book/item', $books);
    }

}