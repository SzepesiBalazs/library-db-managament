<?php

function listCategories($pdo, $category_name = null)
{
    $sql = "SELECT categories.category_name FROM categories WHERE categories.category_name LIKE :category_name";

    $params = [
        ":category_name" => '%' . $category_name . '%',
    ];

    $stmt = $pdo->prepare($sql);
    $stmt->execute($params);

    $categories = $stmt->fetchAll(PDO::FETCH_ASSOC);

    return json_encode($categories);
}
