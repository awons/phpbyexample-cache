<?php

declare(strict_types=1);

namespace AWons\PhpByExample\Cache\Persistence;

use AWons\PhpByExample\Cache\Domain\BooksCollection;
use AWons\PhpByExample\Cache\Domain\Id;
use AWons\PhpByExample\Cache\Domain\Title;

interface Repository
{
    public function getBooks(): BooksCollection;

    public function updateTitle(Id $id, Title $title): void;
}
