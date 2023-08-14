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

    public function findBooks(string $bookName, string $authorName): array
    {
        $query = 'select b.* from ' . Book::getTable() . ' b ';
        if ($authorName) {
            $query .= 'inner join book_author b_a on b_a.book_id = b.id
            inner join author a on b_a.author_id = a.id
            where a.name ILIKE :author ';
        }
        if ($bookName) {
            $query .= $authorName ? 'and' : 'where';
            $query .= ' b.name ILIKE :book ';
        }

        $stm = $this->getConnection()->prepare($query);
        if ($authorName) {
            $stm->bindValue('author', '%' . $authorName . '%');
        }
        if ($bookName) {
            $stm->bindValue('book', '%' . $bookName . '%');
        }
        $res = $stm->execute();

        return $stm->fetchAll(PDO::FETCH_ASSOC) ?? [];
    }

}