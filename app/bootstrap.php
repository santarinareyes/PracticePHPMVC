<?php 
    require_once "config/config.php";
    require_once "helpers/FormSanitizer.php";

    spl_autoload_register(function($className){
        require_once "libraries/$className.php";
    });