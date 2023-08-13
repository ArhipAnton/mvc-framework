<?php

namespace App\Model\Repository;

use PDO;

class AuthorRepository extends AbstractRepository
{
    public function getAuthorsForBooks(array $ids): array
    {
        $ids = array_filter($ids, 'is_int');

        $st = $this->getConnection()->prepare(
            'select a.name, b_a.book_id
            from author a 
            inner join book_author b_a on b_a.author_id = a.id
            where b_a.book_id IN(' . implode(', ', $ids) . ');');
        $res = $st->execute();

        return $st->fetchAll(PDO::FETCH_ASSOC) ?? [];
    }
}