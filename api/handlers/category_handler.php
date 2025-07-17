<?php

require_once __DIR__ . '/../../database/list_categories.php';
require_once __DIR__ . '/../../database/add_category.php';

class CategoryHandler {
    public static function list($pdo) {
        $category_name = $_GET['category_name'] ?? '';
        echo listCategories($pdo, $category_name);
    }

    public static function create($pdo) {
        $data = json_decode(file_get_contents("php://input"), true);
        echo addCategory($pdo, $data);
    }
}
