<?php

declare(strict_types=1);

namespace AWons\PhpByExample\Cache\Examples\WriteThrough;

use AWons\PhpByExample\Cache\Domain\Id;
use AWons\PhpByExample\Cache\Domain\Title;
use AWons\PhpByExample\Cache\Examples\WriteThrough\Persistence\WriteRepository;

class Service
{
    public function __construct(private WriteRepository $repository)
    {
    }

    public function updateBook(Id $id, Title $title): void
    {
        $this->repository->updateTitle($id, $title);
    }
}
