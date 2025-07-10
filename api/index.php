<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once __DIR__ . '/../database/connection.php';
require_once __DIR__ . '/../database/list_authors.php';
require_once __DIR__ . '/../database/add_author.php';
require_once __DIR__ . '/../database/update_author.php';
require_once __DIR__ . '/../database/delete_author.php';

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json");

$request = trim(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH), '/');
$path = explode('/', $request);

if (count($path) >= 2 && $path[0] === 'api') {
    switch ($path[1]) {
        case 'authors': // GET: /api/authors?name=...
            $name = $_GET['name'] ?? '';
            echo listAuthors($pdo, $name);
            break;

        case 'author': // POST: /api/author or PATCH: /api/author/{id}
            $raw = file_get_contents("php://input");
            $data = json_decode($raw, true);

            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                echo addAuthor($pdo, $data);
            
            } elseif ($_SERVER['REQUEST_METHOD'] === 'PATCH' && isset($path[2])) {
                $authorId = intval($path[2]);
                updateAuthor($pdo, $authorId, $data);

            } elseif ($_SERVER['REQUEST_METHOD'] === 'DELETE' && isset($path[2])) {
                $authorId = intval($path[2]);
                deleteAuthor($pdo, $authorId);
            
            } else {
                http_response_code(400);
                echo json_encode(['error' => 'Invalid method or missing author ID']);
            }
            break;

        default:
            http_response_code(404);
            echo json_encode(['error' => 'API route not found']);
            break;
    }
} else {
    http_response_code(404);
    echo json_encode(['error' => 'Invalid API path']);
}
