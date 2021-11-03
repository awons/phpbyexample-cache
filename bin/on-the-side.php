<?php

declare(strict_types=1);

require_once __DIR__ . '/../bootstrap.php';

use AWons\PhpByExample\Cache\Cache\APCUCache;
use AWons\PhpByExample\Cache\Examples\OnTheSide\Service;
use AWons\PhpByExample\Cache\ConsoleLogger;
use AWons\PhpByExample\Cache\Persistence\DbRepository;
use AWons\PhpByExample\Cache\Domain\Book;
use AWons\PhpByExample\Cache\Domain\Id;
use AWons\PhpByExample\Cache\Domain\Title;
use AWons\PhpByExample\Cache\MyPdo;

$logger = new ConsoleLogger();
$pdo = new MyPdo();

$cache = new APCUCache($logger);
$repository = new DbRepository($pdo, $logger);

$service = new Service($repository, $cache);

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

$logger->info('-----------------------------------------------------------------------------------------');
$service->updateBook(new Id(1), new Title('Book title 1 - 9th Edition'));
$logger->info('-----------------------------------------------------------------------------------------');

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
