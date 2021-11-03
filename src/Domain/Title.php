<?php

declare(strict_types=1);

namespace AWons\PhpByExample\Cache\Domain;

use InvalidArgumentException;

class Title
{
    public function __construct(private string $value)
    {
        $this->assertIsValid($value);
    }

    public function asString(): string
    {
        return $this->value;
    }

    private function assertIsValid(string $value): void
    {
        if ($value === '') {
            throw new InvalidArgumentException('Title cannot be empty');
        }
    }
}
