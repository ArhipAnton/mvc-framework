<?php

use App\Kernel\Connection;

return function (Connection $connection) {
    $connection->setEnvironment('172.24.0.2', 'books', 'admin', 'admin');
};