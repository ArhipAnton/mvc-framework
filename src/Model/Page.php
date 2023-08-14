<?php

namespace App\Model;

use App\Kernel\AbstractModel;

class Page extends AbstractModel
{
    private int $id;
    private string $text;
    private int $num;

    public static function getTable(): string
    {
        return 'page';
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getText(): string
    {
        return $this->text;
    }

    public function getNum(): int
    {
        return $this->num;
    }
}