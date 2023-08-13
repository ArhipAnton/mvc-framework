<?php

namespace App\Model\Repository;

use App\Kernel\Application;
use App\Model\Book;
use PDO;

class BookRepository
{
    private PDO $connection;

    public function __construct()
    {
        $this->connection = Application::getConnection();
    }

    public function getAllBooks()
    {
        $st = $this->connection->query('select * from ' . Book::getTable() . ';');
        $res = $st->fetchAll(PDO::FETCH_CLASS, Book::class);
        return $res;
    }

    public function getBook(int $id)
    {
        $st = $this->connection->query(
            'select b.id, b.name, string_agg(DISTINCT(a.name), \', \'), COUNT(p.id) as pages, MIN(p.id) as min
    from book b 
    inner join book_author b_a on b.id = b_a.book_id and b.id = '.$id.'
    inner join author a on a.id = b_a.author_id
    inner join page p on b.id = p.book_id
    group by b.id   ;'
        );
        $res = $st->fetchAll(PDO::FETCH_CLASS, Book::class);
        return $res;
    }
}