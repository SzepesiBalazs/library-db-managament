<?php

function updateAuthor($pdo, $id, $data)
{
    $sql = "UPDATE authors SET name = :name, dob = :dob, nationality = :nationality WHERE author_id = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        ":id" => $id,
        ":name" => $data['name'],
        ":dob" => $data['dob'],
        ":nationality" => $data['nationality']
    ]);
    echo "Author updated successfully!";
}
