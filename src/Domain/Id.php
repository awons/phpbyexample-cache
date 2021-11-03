<?php

declare(strict_types=1);

namespace AWons\PhpByExample\Cache\Domain;

class Id
{
    public function __construct(private int $value)
    {
        $this->assertIsValid($value);
    }

    public function asInt(): int
    {
        return $this->value;
    }

    private function assertIsValid(int $value)
    {
        if ($value < 1) {
            throw new \InvalidArgumentException(sprintf('Id cannot be lower than 1 but [%d] given.', $value));
        }
    }
}
