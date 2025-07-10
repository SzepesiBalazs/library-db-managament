<?php

function listBooks($pdo, $title = null, $author_name = null, $category_name = null, $availability = null)
{
    $sql = "SELECT books.title, authors.name AS author_name, categories.category_name AS category_name, books.availability 
            FROM books
            JOIN authors ON books.author_id = authors.author_id
            JOIN categories ON books.category_id = categories.category_id
            WHERE books.title LIKE :title
              AND authors.name LIKE :author_name
              AND categories.category_name LIKE :category_name
              AND books.availability LIKE :availability";

    $params = [
        ":title" => '%' . $title . '%',
        ":author_name" => '%' . $author_name . '%',
        ":category_name" => '%' . $category_name . '%',
        ":availability" => '%' . $availability . '%'
    ];

    $stmt = $pdo->prepare($sql);
    $stmt->execute($params);

    $books = $stmt->fetchAll(PDO::FETCH_ASSOC);

    return json_encode($books);
}
