<?php

$baseDir = 'https://test-task-php2.000webhostapp.com';
$request = $_SERVER['REQUEST_URI'];
$baseUri = str_replace($baseDir, '', $request);

switch ($baseUri) {
    case '':
    case '/':
        require __DIR__ . '/views/home.php';
        break;

    case '/add-product':
        require __DIR__ . '/views/product.php';
        break;
    
    case '/api/del':
        require __DIR__ . '/api/ProductDel.php';
        break;

    case '/api/add':
        require __DIR__ . '/api/ProductAdd.php';
        break;
    
    default:
        http_response_code(404);
        require __DIR__ . '/views/404.php';
        break;
}