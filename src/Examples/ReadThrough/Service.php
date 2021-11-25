<?php

declare(strict_types=1);

namespace AWons\PhpByExample\Cache\Examples\ReadThrough;

use AWons\PhpByExample\Cache\Domain\BooksCollection;
use AWons\PhpByExample\Cache\Examples\ReadThrough\Persistence\ReadRepository;

class Service
{
    public function __construct(private ReadRepository $repository)
    {
    }

    public function getAllBooks(): BooksCollection
    {
        return $this->repository->getBooks();
    }
}
