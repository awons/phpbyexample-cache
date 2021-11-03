<?php

declare(strict_types=1);

namespace AWons\PhpByExample\Cache\Domain;

class Book
{
    private const FIELD_ID = 'id';
    private const FIELD_AUTHOR = 'author';
    private const FIELD_TITLE = 'title';

    public function __construct(
        private Id $id,
        private Author $author,
        private Title $title
    ) {
    }

    public function getAuthor(): Author
    {
        return $this->author;
    }

    public function getTitle(): Title
    {
        return $this->title;
    }

    public function asArray(): array
    {
        return [
            self::FIELD_ID => $this->id->asInt(),
            self::FIELD_AUTHOR => $this->author->asString(),
            self::FIELD_TITLE => $this->title->asString(),
        ];
    }

    public static function fromArray(array $data): self
    {
        return new self(
            new Id($data[self::FIELD_ID]),
            new Author($data[self::FIELD_AUTHOR]),
            new Title($data[self::FIELD_TITLE])
        );
    }
}
