<?php

declare(strict_types=1);

use AWons\PhpByExample\Cache\Cache\APCUCache;
use AWons\PhpByExample\Cache\ConsoleLogger;
use AWons\PhpByExample\Cache\Examples\ReadThrough\Persistence\CachedReadRepository;
use AWons\PhpByExample\Cache\Examples\ReadThrough\Persistence\DbReadRepository;
use AWons\PhpByExample\Cache\Examples\ReadThrough\Service;
use AWons\PhpByExample\Cache\MyPdo;
use AWons\PhpByExample\Cache\Persistence\DbRepository;

require_once __DIR__ . '/../bootstrap.php';

$logger = new ConsoleLogger();
$pdo = new MyPdo();

$cache = new APCUCache($logger);
$dbRepository = new DbRepository($pdo, $logger);
$cachedReadRepository = new CachedReadRepository(new DbReadRepository($dbRepository), $cache);

$service = new Service($cachedReadRepository);

$logger->info('Looking for books');
$books = $service->getAllBooks();

/** @var Book $book */
foreach ($books as $book) {
    $logger->info(
        sprintf(
            'Book [%s] by [%s]',
            $book->getTitle()->asString(),
            $book->getAuthor()->asString()
        )
    );
}

$logger->info('Looking for books');
$books = $service->getAllBooks();

/** @var Book $book */
foreach ($books as $book) {
    $logger->info(
        sprintf(
            'Book [%s] by [%s]',
            $book->getTitle()->asString(),
            $book->getAuthor()->asString()
        )
    );
}
