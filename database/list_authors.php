<?php

function listAuthors($pdo, $name = null, $dob = null, $nationality = null)
{

    $sql = "SELECT authors.name, authors.dob, authors.nationality 
    FROM authors
    WHERE authors.name LIKE :name";

    $params = [
        ":name" => '%' . $name . '%'
    ];

    $stmt = $pdo->prepare($sql);
    $stmt->execute($params);

    $authors = $stmt->fetchAll(PDO::FETCH_ASSOC);

    return json_encode($authors);
}
