<?php

$baseDir = '/test-task-php2.0';
$request = $_SERVER['REQUEST_URI'];
// var_dump($request);
$baseUri = str_replace($baseDir, '', $request);
// var_dump($baseUri);

switch ($baseUri) {

    case '':
    case '/':
        require __DIR__ . '/views/home.php';
        break;

    case '/add-product':
        require __DIR__ . '/views/product.php';
        break;

    default:
        http_response_code(404);
        require __DIR__ . '/views/404.php';
        break;
}