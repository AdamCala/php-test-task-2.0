<?php
    spl_autoload_register('myAutoloader');

    function myAutoloader($class){
        $pieces = explode("\\",$class);
        $class = str_replace("\\","/",$class);
        include_once $class . '.'.$pieces[0].'.php';
    }