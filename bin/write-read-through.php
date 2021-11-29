<?php

declare(strict_types=1);

use AWons\PhpByExample\Cache\Cache\APCUCache;
use AWons\PhpByExample\Cache\ConsoleLogger;
use AWons\PhpByExample\Cache\Domain\Id;
use AWons\PhpByExample\Cache\Domain\Title;
use AWons\PhpByExample\Cache\Examples\WriteReadThrough\Persistence\CachedWriteReadRepository;
use AWons\PhpByExample\Cache\Examples\WriteReadThrough\Persistence\DbWriteReadRepository;
use AWons\PhpByExample\Cache\Examples\WriteReadThrough\Service;
use AWons\PhpByExample\Cache\MyPdo;
use AWons\PhpByExample\Cache\Persistence\DbRepository;

require_once __DIR__ . '/../bootstrap.php';

$logger = new ConsoleLogger();
$pdo = new MyPdo();

$cache = new APCUCache($logger);
$dbRepository = new DbRepository($pdo, $logger);

$cachedRepository = new CachedWriteReadRepository(
    new DbWriteReadRepository($dbRepository),
    $cache
);

$service = new Service($cachedRepository);

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

foreach ($books as $book) {
    $logger->info(
        sprintf(
            'Book [%s] by [%s]',
            $book->getTitle()->asString(),
            $book->getAuthor()->asString()
        )
    );
}

$logger->info('-----------------------------------------------------------------------------------------');
$service->updateBook(new Id(1), new Title('Book title 1 - 9th Edition'));
$logger->info('-----------------------------------------------------------------------------------------');

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

foreach ($books as $book) {
    $logger->info(
        sprintf(
            'Book [%s] by [%s]',
            $book->getTitle()->asString(),
            $book->getAuthor()->asString()
        )
    );
}
