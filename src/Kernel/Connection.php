<?php

namespace App\Kernel;

use PDO;

class Connection
{
    private $host;
    private $db;
    private $user;
    private $pass;

    public function setEnvironment(string $host, string $db, string $user, string $pass)
    {
        $this->host = $host;
        $this->db = $db;
        $this->user = $user;
        $this->pass = $pass;
    }

    public function connect()
    {
        $pdo = new PDO(
            "pgsql:host={$this->host};port=5432;dbname={$this->db};",
            $this->user,
            $this->pass
        );
        return $pdo;
    }
}