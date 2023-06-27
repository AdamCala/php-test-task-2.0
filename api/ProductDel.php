<?php
    include 'autoloader.php';
    header("Access-Control-Allow-Origin: *");
    header("Access-Control-Allow-Methods: GET, POST");
    header("Access-Control-Allow-Headers: Content-Type");
    header('Content-Type: application/json');

    $delete_obj = new classes\ProductDelete();
    $delete_obj->prepareSku();