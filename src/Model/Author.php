<?php

namespace App\Model;

use App\Kernel\AbstractModel;

class Author extends AbstractModel
{
    private int $id;
    private string $name;

    public static function getTable()
    {
        return 'author';
    }

    public function getName(): string
    {
        return $this->name;
    }
}