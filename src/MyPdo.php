<?php

declare(strict_types=1);

namespace AWons\PhpByExample\Cache;

use PDO;

class MyPdo extends PDO
{
    public function __construct()
    {
        parent::__construct('mysql:dbname=mariadb;host=127.0.0.1;dbname=mariadb;charset=utf8', 'root', 'mariadb', [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
    }
}
