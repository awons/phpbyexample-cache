<?php

declare(strict_types=1);

namespace AWons\PhpByExample\Cache\Examples\WriteReadThrough\Persistence;

use AWons\PhpByExample\Cache\Domain\BooksCollection;
use AWons\PhpByExample\Cache\Domain\Id;
use AWons\PhpByExample\Cache\Domain\Title;

interface WriteReadRepository
{
    public function updateTitle(Id $id, Title $title): void;

    public function getBooks(): BooksCollection;
}
