<?php
    include 'autoloader.php';
    header("Access-Control-Allow-Origin: *");
    header("Access-Control-Allow-Methods: GET, POST");
    header("Access-Control-Allow-Headers: Content-Type");
    header('Content-Type: application/json');

    $r = file_get_contents('php://input');
    var_dump(json_decode($r, true));