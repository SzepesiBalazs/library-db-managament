<?php

require "database/connection.php";
require "database/list_authors.php";

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json");

$request = $_GET['route'] ?? '';
switch ($request) {
    case 'authors':
        echo listAuthors($pdo);
        break;
    default:
        http_response_code(404);
        echo json_encode(['error' => 'Endpoint not found']);
        break;
}
