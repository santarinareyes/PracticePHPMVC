<?php 
    ob_start();
    session_start();
    require_once "config/config.php";

    spl_autoload_register(function($className){
        require_once "libraries/$className.php";
    });