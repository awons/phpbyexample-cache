CREATE TABLE IF NOT EXISTS books (
    id INT KEY AUTO_INCREMENT,
    title VARCHAR(255),
    author VARCHAR(255)
)  CHARACTER SET utf8;

TRUNCATE TABLE books;

INSERT INTO books (id, title, author) VALUES (1, 'Book title 1', 'Jane Smith'), (2, 'Book title 2', 'John Smith');
