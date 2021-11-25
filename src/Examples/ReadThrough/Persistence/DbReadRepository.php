<?php

declare(strict_types=1);

namespace AWons\PhpByExample\Cache\Examples\ReadThrough\Persistence;

use AWons\PhpByExample\Cache\Domain\BooksCollection;
use AWons\PhpByExample\Cache\Persistence\Repository;

class DbReadRepository implements ReadRepository
{
    public function __construct(private Repository $coreRepository)
    {
    }

    public function getBooks(): BooksCollection
    {
        return $this->coreRepository->getBooks();
    }
}
