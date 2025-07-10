<?php

function deleteAuthor($pdo, $id){
   
    $sql = "DELETE FROM authors WHERE author_id = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        ":id" => $id,
    ]);

    echo "Deleted author from the database!";
}
