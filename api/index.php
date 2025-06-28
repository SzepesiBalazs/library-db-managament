<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


require_once __DIR__ . '/../database/connection.php';
require_once __DIR__ . '/../database/list_authors.php';
require_once __DIR__ . '/../database/add_author.php';

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json");

$request = trim(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH), '/');
$path = explode('/', $request);

if (count($path) >= 2 && $path[0] === 'api') {
    switch ($path[1]) {
        case 'authors':
            $name = $_GET['name'] ?? '';
            echo listAuthors($pdo, $name);
            break;

        case 'author':
            $raw = file_get_contents("php://input");
            $data = json_decode($raw, true);
            echo addAuthor($pdo, $data);
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
