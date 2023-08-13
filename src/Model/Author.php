<?php

namespace App\Model;

use App\Kernel\AbstractModel;

class Author extends AbstractModel
{
    private $id;
    private $name;

    public static function getTable()
    {
        return 'author';
    }
}