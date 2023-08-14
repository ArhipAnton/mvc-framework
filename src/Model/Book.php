<?php

namespace App\Model;

use App\Kernel\AbstractModel;

class Book extends AbstractModel
{
    private int $id;
    private string $name;

    public static function getTable(): string
    {
        return 'book';
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName($name): void
    {
        $this->name = $name;
    }

    public function getId(): int
    {
        return $this->id;
    }
}