<?php

declare(strict_types=1);

use AWons\PhpByExample\Cache\Cache\APCUCache;
use AWons\PhpByExample\Cache\ConsoleLogger;
use AWons\PhpByExample\Cache\Domain\Id;
use AWons\PhpByExample\Cache\Domain\Title;
use AWons\PhpByExample\Cache\Examples\ReadThrough\Persistence\CachedReadRepository;
use AWons\PhpByExample\Cache\Examples\ReadThrough\Persistence\DbReadRepository;
use AWons\PhpByExample\Cache\Examples\ReadThrough\Service as ReadService;
use AWons\PhpByExample\Cache\Examples\WriteThrough\Persistence\CachedWriteRepository;
use AWons\PhpByExample\Cache\Examples\WriteThrough\Persistence\DbWriteRepository;
use AWons\PhpByExample\Cache\Examples\WriteThrough\Service as WriteService;
use AWons\PhpByExample\Cache\MyPdo;
use AWons\PhpByExample\Cache\Persistence\DbRepository;

require_once __DIR__ . '/../bootstrap.php';

$logger = new ConsoleLogger();
$pdo = new MyPdo();

$cache = new APCUCache($logger);
$dbRepository = new DbRepository($pdo, $logger);

$cachedReadRepository = new CachedReadRepository(new DbReadRepository($dbRepository), $cache);
$readService = new ReadService($cachedReadRepository);

$logger->info('Looking for books');
$books = $readService->getAllBooks();

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
$books = $readService->getAllBooks();

foreach ($books as $book) {
    $logger->info(
        sprintf(
            'Book [%s] by [%s]',
            $book->getTitle()->asString(),
            $book->getAuthor()->asString()
        )
    );
}

$cachedWriteRepository = new CachedWriteRepository(new DbWriteRepository($dbRepository), $cache);
$writeService = new WriteService($cachedWriteRepository);


$logger->info('-----------------------------------------------------------------------------------------');
$writeService->updateBook(new Id(1), new Title('Book title 1 - 9th Edition'));
$logger->info('-----------------------------------------------------------------------------------------');

$logger->info('Looking for books');
$books = $readService->getAllBooks();

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
$books = $readService->getAllBooks();

foreach ($books as $book) {
    $logger->info(
        sprintf(
            'Book [%s] by [%s]',
            $book->getTitle()->asString(),
            $book->getAuthor()->asString()
        )
    );
}