<?php

require 'connection.php';

function addCategory($pdo, $category_name){
    $sql = "INSERT INTO categories (category_name) VALUES (:category_name)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        ':category_name' => $category_name
    ]);
    echo "Category added succesfully!";
}

addCategory($pdo, "Horror");