<?php
    include 'autoloader.php';
    header('Content-Type: application/json');

    if(isset($_POST['SKU'])){
        var_dump($_POST['SKU']);
    }