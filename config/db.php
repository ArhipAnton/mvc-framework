<?php

use App\Kernel\Connection;

return function (Connection $connection) {
    $connection->setEnvironment('172.24.0.3', 'books', 'admin', 'admin');
};