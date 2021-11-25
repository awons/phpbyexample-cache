<?php

declare(strict_types=1);

namespace AWons\PhpByExample\Cache\Examples\WriteThrough\Persistence;

use AWons\PhpByExample\Cache\Domain\Id;
use AWons\PhpByExample\Cache\Domain\Title;

interface WriteRepository
{
    public function updateTitle(Id $id, Title $title): void;
}
