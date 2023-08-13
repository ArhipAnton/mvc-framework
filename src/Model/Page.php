<?php

namespace App\Model;

use App\Kernel\AbstractModel;

class Page extends AbstractModel
{
    private $id;
    private $text;

    public static function getTable(): string
    {
        return 'book';
    }


    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getText()
    {
        return $this->text;
    }
}