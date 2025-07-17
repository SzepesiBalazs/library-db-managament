<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once __DIR__ . '/../database/connection.php';

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json");


$routes = require_once __DIR__ . '/routes.php';

$method = $_SERVER['REQUEST_METHOD'];
$requestUri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);


if (isset($routes[$method])) {
    foreach ($routes[$method] as $route => $handler) {

        $pattern = preg_replace('#\{[^\}]+\}#', '(\d+)', $route);
        if (preg_match("#^{$pattern}$#", $requestUri, $matches)) {
            array_shift($matches);
            call_user_func_array($handler, array_merge([$pdo], $matches));
            exit;
        }
    }
}

http_response_code(404);
echo json_encode(['error' => 'Route not found']);
