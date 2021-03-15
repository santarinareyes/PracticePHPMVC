<?php 
    require_once "../app/bootstrap.php";
    require APPROOT . "/views/includes/header.php";
    if(!str_contains($_GET["url"], "watch")):
    require APPROOT . "/views/includes/nav.php";
    endif;
    $init = new App();
    require APPROOT . "/views/includes/footer.php";