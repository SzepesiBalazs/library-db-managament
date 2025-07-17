<?php
require_once __DIR__ . '/handlers/author_handler.php';
require_once __DIR__ . '/handlers/book_handler.php';
require_once __DIR__ . '/handlers/category_handler.php';

return [
    'GET' => [
        '/api/authors' => [AuthorHandler::class, 'list'],
        '/api/books' => [BookHandler::class, 'list'],
        '/api/categories' => [CategoryHandler::class, 'list']
    ],

    'POST' => [
        '/api/author' => [AuthorHandler::class, 'create'],
        '/api/book' => [BookHandler::class, 'create'],
        '/api/category' => [CategoryHandler::class, 'create']
    ],

    'PATCH' => [
        '/api/author/{id}' => [AuthorHandler::class, 'update']
    ],

    'DELETE' => [
        '/api/author/{id}' => [AuthorHandler::class, 'delete']
    ]
];
