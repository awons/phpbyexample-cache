<?php

declare(strict_types=1);

namespace AWons\PhpByExample\Cache\Examples\WriteThrough\Persistence;

use AWons\PhpByExample\Cache\Cache\Cache;
use AWons\PhpByExample\Cache\Cache\CacheKey;
use AWons\PhpByExample\Cache\Domain\Id;
use AWons\PhpByExample\Cache\Domain\Title;

class CachedWriteRepository implements WriteRepository
{
    private const KEY_ALL_BOOKS = 'all_books';

    public function __construct(private WriteRepository $next, private Cache $cache)
    {
        
    }

    public function updateTitle(Id $id, Title $title): void
    {
        $cacheKey = new CacheKey(self::KEY_ALL_BOOKS);
        $this->next->updateTitle($id, $title);
        $this->cache->delete($cacheKey);
    }
}