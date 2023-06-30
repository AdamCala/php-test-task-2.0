<?php
    include 'autoloader.php';
    header("Access-Control-Allow-Origin: *");
    header("Access-Control-Allow-Methods: GET, POST");
    header("Access-Control-Allow-Headers: Content-Type");
    header('Content-Type: application/json');

    $validation = new classes\ProductAdd();
    $test = $validation->addProductCheck();
    echo json_encode($test);