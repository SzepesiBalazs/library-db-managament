<?php

require "connection.php";

function updateBookAvailability($pdo, $book_id, $availability)
{

    $availability = (int) $availability; //used chatgpt because it throwed errors without it.

    $sql = "UPDATE books SET availability = :availability WHERE book_id = :book_id";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        ":availability" => $availability,
        ":book_id" => $book_id
    ]);
    echo "Book availability updated successfully!";
}

updateBookAvailability($pdo, 1, false);

