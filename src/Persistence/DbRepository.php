<?php

declare(strict_types=1);

namespace AWons\PhpByExample\Cache\Persistence;

use AWons\PhpByExample\Cache\Domain\Author;
use AWons\PhpByExample\Cache\Domain\Book;
use AWons\PhpByExample\Cache\Domain\BooksCollection;
use AWons\PhpByExample\Cache\Domain\Id;
use AWons\PhpByExample\Cache\Domain\Title;
use PDO;
use Psr\Log\LoggerInterface;

class DbRepository implements Repository
{
    public function __construct(private PDO $pdo, private LoggerInterface $logger)
    {
    }

    public function getBooks(): BooksCollection
    {
        $this->logger->info('Loading books from DB');

        $query = "SELECT * FROM books ORDER BY id ASC";
        $stmt = $this->pdo->prepare($query);
        $stmt->execute();

        $books = new BooksCollection();
        foreach ($stmt->fetchAll(PDO::FETCH_ASSOC) as $row) {
            $books->add(
                new Book(
                    new Id((int)$row['id']),
                    new Author($row['author']),
                    new Title($row['title'])
                )
            );
        }

        return $books;
    }

    public function updateTitle(Id $id, Title $title): void
    {
        $this->logger->info(
            sprintf('Updating book [%d] with new title [%s]', $id->asInt(), $title->asString())
        );

        $query = "UPDATE books SET title=:title WHERE id=:id";
        $stmt = $this->pdo->prepare($query);
        $idValue = $id->asInt();
        $titleValue = $title->asString();
        $stmt->bindParam('id', $idValue);
        $stmt->bindParam('title', $titleValue);
        $stmt->execute();
    }
}
