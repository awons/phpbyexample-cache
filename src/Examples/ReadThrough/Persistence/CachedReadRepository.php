<?php

declare(strict_types=1);

namespace AWons\PhpByExample\Cache\Examples\ReadThrough\Persistence;

use AWons\PhpByExample\Cache\Cache\Cache;
use AWons\PhpByExample\Cache\Cache\CacheKey;
use AWons\PhpByExample\Cache\Domain\BooksCollection;

class CachedReadRepository implements ReadRepository
{
    private const KEY_ALL_BOOKS = 'all_books';

    public function __construct(private DbReadRepository $next, private Cache $cache)
    {
    }

    public function getBooks(): BooksCollection
    {
        $cacheKey = new CacheKey(self::KEY_ALL_BOOKS);
        if (!$this->cache->has($cacheKey)) {
            $books = $this->next->getBooks();
            $this->cache->put($cacheKey, $books);

            return $books;
        }

        return BooksCollection::fromArray($this->cache->get($cacheKey)->asArray());
    }
}
