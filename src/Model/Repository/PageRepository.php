<?php

namespace App\Model\Repository;

use App\Model\Page;
use PDO;

class PageRepository extends AbstractRepository
{
    public function getPageInfoForBooks(array $ids): array
    {
        $ids = array_filter($ids, 'is_int');

        $st = $this->getConnection()->prepare(
            'select p.book_id as book_id,
            COUNT(p.id) as count,
            MIN(p.id) as first_page
            from page p 
            where p.book_id IN(' . implode(', ', $ids) . ')
            group by p.book_id
            ;');
        $res = $st->execute();

        return $st->fetchAll(PDO::FETCH_ASSOC) ?? [];
    }

    public function getPage(int $bookId, int $pageId)
    {
        $st = $this->getConnection()->prepare(
            'select *
            from page p 
            where p.book_id = ' . $bookId . '
            and p.id = ' . $pageId . '
            ;');
        $res = $st->execute();
        $res = $st->fetchObject(Page::class);

        return $res;
    }

    public function getPageList(int $bookId): array
    {
        $st = $this->getConnection()->prepare(
            'select *
            from page p 
            where p.book_id = ' . $bookId . '
            order by p.num
            ;');
        $res = $st->execute();

        return $st->fetchAll(PDO::FETCH_CLASS, Page::class) ?? [];
    }
}