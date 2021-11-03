<?php

declare(strict_types=1);

namespace AWons\PhpByExample\Cache\Domain;

use InvalidArgumentException;

class Author
{
    public function __construct(private string $name)
    {
        $this->assertIsValid($name);
    }

    public function asString(): string
    {
        return $this->name;
    }

    private function assertIsValid(string $name): void
    {
        if ($name === '') {
            throw new InvalidArgumentException("Author's name cannot be empty");
        }
    }
}
