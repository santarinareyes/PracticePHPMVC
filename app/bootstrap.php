<?php 
    include "config/config.php";

    spl_autoload_register(function($className){
        require_once "libraries/$className.php";
    });