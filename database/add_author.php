<?php

require 'connection.php';

function addAuthor($pdo, $name, $dob, $nationality) {
    $sql = "INSERT INTO authors (name, dob, nationality) VALUES (:name, :dob, :nationality)";
    $stmt = $pdo->prepare($sql);
    $stmt ->execute([
        ":name" => $name,
        ":dob" => $dob,
        ":nationality" => $nationality
    ]);
    echo "Author added succesfully!";
}

addAuthor($pdo, "Bela Bela", '1998-10-09', 'Hungarian');