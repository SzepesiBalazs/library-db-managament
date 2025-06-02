<?php

require "connection.php";

function deleteBooks($pdo, $title){
    $sql = "DELETE FROM books WHERE books.title LIKE :title";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        ":title" => $title,
    ]);

    echo "Deleted book from the database!";
}

deleteBooks($pdo, "Random Book3");