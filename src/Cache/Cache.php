<?php

declare(strict_types=1);

namespace AWons\PhpByExample\Cache\Cache;

use AWons\PhpByExample\Cache\Cache\CacheKey;
use AWons\PhpByExample\Cache\Data\JsonFiable;
use AWons\PhpByExample\Cache\Data\JsonObject;

interface Cache
{
    public function has(CacheKey $cacheKey): bool;

    public function get(CacheKey $cacheKey): JsonObject;

    public function put(CacheKey $cacheKey, JsonFiable $value): void;

    public function delete(CacheKey $cacheKey): void;
}
