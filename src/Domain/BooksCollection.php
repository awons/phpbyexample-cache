<?php

declare(strict_types=1);

namespace AWons\PhpByExample\Cache\Domain;

use ArrayIterator;
use AWons\PhpByExample\Cache\Data\JSONFiable;
use IteratorAggregate;
use Traversable;

class BooksCollection implements IteratorAggregate, JSONFiable
{
    /** @var Book[] */
    private $items = [];

    public function add(Book $book): void
    {
        $this->items[] = $book;
    }

    public function getIterator(): Traversable
    {
        return new ArrayIterator($this->items);
    }

    public function asArray(): array
    {
        $data = [];

        foreach ($this->items as $item) {
            $data[] = $item->asArray();
        }

        return $data;
    }

    public function toJson(): string
    {
        return json_encode($this->asArray());
    }

    public static function fromArray(array $data): self
    {
        $books = new self();

        foreach ($data as $bookData) {
            $books->add(Book::fromArray($bookData));
        }

        return $books;
    }
}
