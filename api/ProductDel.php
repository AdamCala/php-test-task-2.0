<?php
    include 'autoloader.php';
    header("Access-Control-Allow-Origin: *");
    header("Access-Control-Allow-Methods: GET, POST");
    header("Access-Control-Allow-Headers: Content-Type");
    header('Content-Type: application/json');

    $jsonPayload = file_get_contents('php://input');
    $data = json_decode($jsonPayload, true);
    var_dump($data);