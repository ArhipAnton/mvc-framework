<?php

namespace App\Model;

use App\Kernel\AbstractModel;

class Book extends AbstractModel
{
    private $id;
    private $name;

    public static function getTable():string
    {
        return 'book';
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name): void
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }
}