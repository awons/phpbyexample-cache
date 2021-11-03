<?php

declare(strict_types=1);

namespace AWons\PhpByExample\Cache\Cache;

use InvalidArgumentException;

class CacheKey
{
    public function __construct(private string $key)
    {
        $this->assertIsValid($key);
    }

    public function asString(): string
    {
        return $this->key;
    }

    public function assertIsValid(string $key): void
    {
        if (preg_match('/^[a-zA-Z1-9_-]+$/', $key) !== 1) {
            throw new InvalidArgumentException(sprintf('Cache key [%s] is invalid', $key));
        }
    }
}
