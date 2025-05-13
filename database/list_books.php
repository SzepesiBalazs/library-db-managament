<?php

require "connection.php";

function listBooks($pdo, $title, $author_name, $category_name, $availability)
{

    $availability = (int) $availability;

    $sql = "SELECT books.title, authors.name AS author_name, categories.category_name AS category_name, books.availability 
    FROM books
    JOIN authors ON books.author_id = authors.author_id
    JOIN categories ON books.category_id = categories.category_id 
    WHERE books.title = :title AND authors.name = :author_name AND categories.name = :category_name AND books.availability = :availability";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        ":title" => $title,
        ":author_name" => $author_name,
        ":category_name" => $category_name,
        ":availability" => $availability
    ]);

    $books = $stmt->fetchAll(PDO::FETCH_ASSOC);

    foreach ($books as $book) {
        echo "Title: " . $book['title'] . "<br>";
        echo "Author: " . $book['author_name'] . "<br>";
        echo "Category: " . $book['category_name'] . "<br>";
        echo "Available: " . ($book['availability'] ? 'Yes' : 'No') . "<br><br>";

    }
}
