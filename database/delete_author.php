<?php

require "connection.php";

function deleteAuthors($pdo, $name){
    $sql = "DELETE FROM authors WHERE author.name LIKE :name";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        ":name" => $name,
    ]);

    echo "Deleted author from the database!";
}

deleteAuthors($pdo, "Bela Bela");