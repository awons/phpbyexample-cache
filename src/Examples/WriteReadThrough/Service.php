<?php

declare(strict_types=1);

namespace AWons\PhpByExample\Cache\Examples\WriteReadThrough;

use AWons\PhpByExample\Cache\Domain\BooksCollection;
use AWons\PhpByExample\Cache\Domain\Id;
use AWons\PhpByExample\Cache\Domain\Title;
use AWons\PhpByExample\Cache\Examples\WriteReadThrough\Persistence\WriteReadRepository;

class Service
{
    public function __construct(private WriteReadRepository $repository)
    {
    }

    public function getAllBooks(): BooksCollection
    {
        return $this->repository->getBooks();
    }

    public function updateBook(Id $id, Title $title): void
    {
        $this->repository->updateTitle($id, $title);
    }
}
