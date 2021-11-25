<?php

declare(strict_types=1);

namespace AWons\PhpByExample\Cache\Examples\WriteThrough\Persistence;

use AWons\PhpByExample\Cache\Domain\Id;
use AWons\PhpByExample\Cache\Domain\Title;
use AWons\PhpByExample\Cache\Persistence\Repository;

class DbWriteRepository implements WriteRepository
{
    public function __construct(private Repository $coreRepository)
    {
    }

    public function updateTitle(Id $id, Title $title): void
    {
        $this->coreRepository->updateTitle($id, $title);
    }
}
