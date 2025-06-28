<?php

require "connection.php";

function deleteByField($pdo, $table, $field, $value) {
    $sql = "DELETE FROM $table WHERE $field = :value";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([":value" => $value]);

    echo "Deleted from $table where $field = $value\n";
}

function deleteBooks($pdo, $title) {
    deleteByField($pdo, "books", "title", $title);
}

function deleteAuthors($pdo, $name) {
    $stmt = $pdo->prepare("SELECT author_id FROM authors WHERE name = :name");
    $stmt->execute([":name" => $name]);
    $author = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$author) {
        echo "Author not found.\n";
        return;
    }

    $authorId = $author['author_id'];

    deleteByField($pdo, "books", "author_id", 1);

    deleteByField($pdo, "authors", "author_id", 1);
}
