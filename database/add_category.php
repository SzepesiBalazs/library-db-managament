<?php

function addCategory($pdo, $data){
    $sql = "INSERT INTO categories (category_name) VALUES (:category_name)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        ':category_name' => $data['category_name']
    ]);
    echo "Category added succesfully!";
}
