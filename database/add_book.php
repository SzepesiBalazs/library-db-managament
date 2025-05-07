<?php

require 'connection.php';

function addBook($pdo, $title, $author_id, $category_id, $published_date, $availability)
{
    $sql = "INSERT INTO books (title, author_id, category_id, published_date, availability) VALUES (:title, :author_id, :category_id, :published_date, :availability)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        ":title" => $title,
        ":author_id" => $author_id,
        ":category_id" => $category_id,
        ":published_date" => $published_date,
        ":availability" => $availability
    ]);
    echo "Book added succesfully!";
}

addBook($pdo, "Random Book", 1, 1, "2025-03-15", true);