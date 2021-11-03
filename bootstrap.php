<?php

declare(strict_types=1);

require_once __DIR__ . '/vendor/autoload.php';

set_error_handler(function ($errorNumber, $errorMessage, $errorFile, $errorLine) {
    throw new ErrorException($errorMessage, 0, $errorNumber, $errorFile, $errorLine);
});
