<?php

require_once __DIR__ . '/../../database/list_books.php';
require_once __DIR__ . '/../../database/add_book.php';

class BookHandler {
    public static function list($pdo) {
        $title = $_GET['title'] ?? '';
        $author_name = $_GET['author_name'] ?? '';
        $category_name = $_GET['category_name'] ?? '';
        $availability = $_GET['availability'] ?? '';

        echo listBooks($pdo, $title, $author_name, $category_name, $availability);
    }

    public static function create($pdo) {
        $data = json_decode(file_get_contents("php://input"), true);
        echo addBook($pdo, $data);
    }
}
    