<?php

namespace App\Service;

use App\Model\Repository\AuthorRepository;
use App\Model\Repository\BookRepository;
use App\Model\Repository\PageRepository;

class BookService
{
    public static function getBookListInfo(): array
    {
        $books = (new BookRepository())->getAllBooks();
        return self::addSideInfo($books);
    }

    public static function getBookSearchInfo($bookName, $authorName): array
    {
        $books = (new BookRepository())->findBooks($bookName, $authorName);
        return self::addSideInfo($books);
    }

    private static function addSideInfo(array $books): array
    {
        if (empty($books)) {
            return [];
        }

        $ids = array_column($books, 'id');
        $authors = (new AuthorRepository())->getAuthorsForBooks($ids);
        $pages = (new PageRepository())->getPageInfoForBooks($ids);

        foreach ($books as &$book) {
            foreach ($authors as $author) {
                if ($book['id'] == $author['book_id']) {
                    $book['authors'][] = $author['name'];
                }
            }
            foreach ($pages as $page) {
                if ($book['id'] == $page['book_id']) {
                    $book['page_count'] = $page['count'];
                    $book['page_first'] = $page['first_page'];
                }
            }
        }

        return $books;
    }
}