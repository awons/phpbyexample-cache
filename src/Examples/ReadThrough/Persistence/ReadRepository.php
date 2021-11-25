<?php

declare(strict_types=1);

namespace AWons\PhpByExample\Cache\Examples\ReadThrough\Persistence;

use AWons\PhpByExample\Cache\Domain\BooksCollection;

interface ReadRepository
{
    public function getBooks(): BooksCollection;
}
