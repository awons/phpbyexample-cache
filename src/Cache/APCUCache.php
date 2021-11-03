<?php

declare(strict_types=1);

namespace AWons\PhpByExample\Cache\Cache;

use AWons\PhpByExample\Cache\Cache\CacheKey;
use AWons\PhpByExample\Cache\Data\JSONFiable;
use AWons\PhpByExample\Cache\Data\JsonObject;
use Psr\Log\LoggerInterface;
use RuntimeException;

class APCUCache implements Cache
{
    public function __construct(private LoggerInterface $logger)
    {
        if (!function_exists('apcu_enabled')) {
            throw new RuntimeException('APC extension is not installed');
        }
        if (!\apcu_enabled()) {
            throw new RuntimeException('APCU cache is not enabled');
        }
    }

    public function has(CacheKey $cacheKey): bool
    {
        $result = \apcu_exists($cacheKey->asString());

        if (!$result) {
            $this->logger->info(sprintf('Cache key [%s] not found', $cacheKey->asString()));
        } else {
            $this->logger->info(sprintf('Cache key [%s] found', $cacheKey->asString()));
        }

        return $result;
    }

    public function get(CacheKey $cacheKey): JsonObject
    {
        if (!$this->has($cacheKey)) {
            throw new RuntimeException(sprintf('Book under key [%s] does not exist in cache', $cacheKey->asString()));
        }

        $result = false;
        $data = \apcu_fetch($cacheKey->asString(), $result);

        if (!$result) {
            throw new RuntimeException(sprintf('Error while retrieving cache key [%s]', $cacheKey->asString()));
        }

        $this->logger->info(sprintf('Returning cache for [%s]', $cacheKey->asString()));

        return new JsonObject($data);
    }

    public function put(CacheKey $cacheKey, JSONFiable $value): void
    {
        $this->delete($cacheKey);
        \apcu_add($cacheKey->asString(), $value->toJson());
    }

    public function delete(CacheKey $cacheKey): void
    {
        \apcu_delete($cacheKey->asString());
    }
}
