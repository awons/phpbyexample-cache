<?php

declare(strict_types=1);

namespace AWons\PhpByExample\Cache\Data;

interface JSONFiable
{
    public function toJson(): string;
}
