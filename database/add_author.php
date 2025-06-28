<?php

function addAuthor($pdo, $data)
{

    $sql = "INSERT INTO authors (name, dob, nationality) VALUES (:name, :dob, :nationality)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        ":name" => $data['name'],
        ":dob" => $data['dob'],
        ":nationality" => $data['nationality']
    ]);
    echo "Author added succesfully!";
}

//addAuthor($pdo, "Bela Bela", '1998-10-09', 'Hungarian');