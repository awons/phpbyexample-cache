<?php

declare(strict_types=1);

namespace AWons\PhpByExample\Cache;

use Monolog\Handler\StreamHandler;
use Monolog\Logger;

class ConsoleLogger extends Logger
{
    public function __construct()
    {
        $handlers = [new StreamHandler('php://stdout')];
        parent::__construct('console', $handlers);
    }
}
