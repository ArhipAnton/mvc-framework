<?php

namespace App\Model\Repository;

use App\Model\Book;
use PDO;

class BookRepository extends AbstractRepository
{
    public function getAllBooks(): array
    {
        $st = $this->getConnection()->query('select * from ' . Book::getTable() . ';');
        return $st->fetchAll(PDO::FETCH_ASSOC) ?? [];
    }

}