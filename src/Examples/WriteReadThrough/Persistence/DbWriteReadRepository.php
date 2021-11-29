<?php

declare(strict_types=1);

namespace AWons\PhpByExample\Cache\Examples\WriteReadThrough\Persistence;

use AWons\PhpByExample\Cache\Domain\BooksCollection;
use AWons\PhpByExample\Cache\Domain\Id;
use AWons\PhpByExample\Cache\Domain\Title;
use AWons\PhpByExample\Cache\Persistence\DbRepository;

class DbWriteReadRepository implements WriteReadRepository
{
    public function __construct(private DbRepository $coreRepository)
    {
    }

    public function updateTitle(Id $id, Title $title): void
    {
        $this->coreRepository->updateTitle($id, $title);
    }

    public function getBooks(): BooksCollection
    {
        return $this->coreRepository->getBooks();
    }
}
