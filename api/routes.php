<?php
require_once __DIR__ . '/handlers.php';
return [
    'GET' => [
        '/api/authors' => 'handleGetAuthors',
        '/api/books' => 'handleGetBooks',
        '/api/categories' => 'handleGetCategories',
    ],

    'POST' => [
        '/api/author' => 'handlePostAuthor',
        '/api/book' => 'handlePostBook',
        '/api/category' => 'handlePostCategory',
    ],

    'PATCH' => [
        '/api/author/{id}' => 'handlePatchAuthor',
    ],

    'DELETE' => [
        '/api/author/{id}' => 'handleDeleteAuthor',
    ]
];
