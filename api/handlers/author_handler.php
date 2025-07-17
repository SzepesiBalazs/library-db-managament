<?php

require_once __DIR__ . '/../../database/list_authors.php';
require_once __DIR__ . '/../../database/add_author.php';
require_once __DIR__ . '/../../database/update_author.php';
require_once __DIR__ . '/../../database/delete_author.php';

class AuthorHandler {
    public static function list($pdo) {
        $name = $_GET['name'] ?? '';
        echo listAuthors($pdo, $name);
    }

    public static function create($pdo) {
        $data = json_decode(file_get_contents("php://input"), true);
        echo addAuthor($pdo, $data);
    }

    public static function update($pdo, $id) {
        $data = json_decode(file_get_contents("php://input"), true);
        updateAuthor($pdo, intval($id), $data);
    }

    public static function delete($pdo, $id) {
        deleteAuthor($pdo, intval($id));
    }
}
