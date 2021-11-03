<?php

declare(strict_types=1);

namespace AWons\PhpByExample\Cache\Data;

class JsonObject
{
    private array $data;

    public function __construct(private string $value)
    {
        $this->data = json_decode($value, true);
    }

    public function asArray(): array
    {
        return $this->data;
    }
}
