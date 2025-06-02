<?php

require "connection.php";

function listBooks($pdo, $title = null, $author_name = null, $category_name = null, $availability = null)
{

    echo $availability;

    $sql = "SELECT books.title, authors.name AS author_name, categories.category_name AS category_name, books.availability 
    FROM books
    JOIN authors ON books.author_id = authors.author_id
    JOIN categories ON books.category_id = categories.category_id 
    WHERE books.title LIKE :title";

    $params = [
        ":title" => '%' . $title . '%',
    ];

    if (isset($author_name)) {
        $sql .= " AND authors.name LIKE :authors_name";
        $params[":authors_name"] = '%' . $author_name . '%';
    }

    $stmt = $pdo->prepare($sql);
    $stmt->execute($params);

    $books = $stmt->fetchAll(PDO::FETCH_ASSOC);

    foreach ($books as $book) {
        echo "Title: " . $book['title'] . "<br>";
        echo "Author: " . $book['author_name'] . "<br>";
        echo "Category: " . $book['category_name'] . "<br>";
        echo "Available: " . ($book['availability'] ? 'Yes' : 'No') . "<br><br>";

    }
}

listBooks($pdo, "", "");
