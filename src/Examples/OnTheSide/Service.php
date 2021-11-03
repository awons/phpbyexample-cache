<?php

declare(strict_types=1);

namespace AWons\PhpByExample\Cache\Examples\OnTheSide;

use AWons\PhpByExample\Cache\Cache\Cache;
use AWons\PhpByExample\Cache\Cache\CacheKey;
use AWons\PhpByExample\Cache\Domain\BooksCollection;
use AWons\PhpByExample\Cache\Domain\Id;
use AWons\PhpByExample\Cache\Domain\Title;
use AWons\PhpByExample\Cache\Persistence\Repository;

class Service
{
    public function __construct(private Repository $repoistory, private Cache $cache)
    {
    }

    public function getAllBooks(): BooksCollection
    {
        $cacheKey = new CacheKey('all_books');

        if (!$this->cache->has($cacheKey)) {
            $books = $this->repoistory->getBooks();
            $this->cache->put($cacheKey, $books);

            return $books;
        }

        $data = $this->cache->get($cacheKey);

        return BooksCollection::fromArray($data->asArray());
    }

    public function updateBook(Id $id, Title $title): void
    {
        $this->repoistory->updateTitle($id, $title);

        $this->cache->delete(new CacheKey('all_books'));
    }
}
