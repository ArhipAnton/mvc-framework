<?php

namespace App\Model\Repository;

use App\Kernel\Application;
use PDO;

class AbstractRepository
{
    private PDO $connection;

    public function __construct()
    {
        $this->connection = Application::getConnection();
    }

    public function getConnection(): PDO
    {
        return $this->connection;
    }
}