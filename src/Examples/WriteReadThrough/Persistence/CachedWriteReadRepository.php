<?php

declare(strict_types=1);

namespace AWons\PhpByExample\Cache\Examples\WriteReadThrough\Persistence;

use AWons\PhpByExample\Cache\Cache\Cache;
use AWons\PhpByExample\Cache\Cache\CacheKey;
use AWons\PhpByExample\Cache\Domain\BooksCollection;
use AWons\PhpByExample\Cache\Domain\Id;
use AWons\PhpByExample\Cache\Domain\Title;

class CachedWriteReadRepository implements WriteReadRepository
{
    private const KEY_ALL_BOOKS = 'all_books';

    public function __construct(private WriteReadRepository $next, private Cache $cache)
    {
    }

    public function updateTitle(Id $id, Title $title): void
    {
        $cacheKey = new CacheKey(self::KEY_ALL_BOOKS);
        $this->next->updateTitle($id, $title);
        $this->cache->delete($cacheKey);
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
