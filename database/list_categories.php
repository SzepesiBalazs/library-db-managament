<?php

require "connection.php";

function list_categories($pdo, $category_name = null)
{
    $sql = "SELECT categories.category_name FROM categories WHERE categories.category_name LIKE :category_name";

    $params = [
        ":category_name" => '%' . $category_name . '%',
    ];


    $stmt = $pdo->prepare($sql);
    $stmt->execute($params);

    $categories = $stmt->fetchAll(PDO::FETCH_ASSOC);

    foreach ($categories as $category) {
        echo "category_name: " . $category['category_name'] . "<br>";
    }
}

list_categories($pdo, "H");