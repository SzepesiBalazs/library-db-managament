<?php

function addBook($pdo, $data)
{
    $sql = "INSERT INTO books (title, author_id, category_id, published_date, availability) VALUES (:title, :author_id, :category_id, :published_date, :availability)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        ":title" => $data['title'],
        ":author_id" => $data['author_id'],
        ":category_id" => $data['category_id'],
        ":published_date" => $data['published_date'],
        ":availability" => $data['availability']
    ]);
    echo "Book added succesfully!";
}