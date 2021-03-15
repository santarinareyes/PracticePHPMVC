<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/8b52689552.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/style.css">
    <script src="<?php echo URLROOT; ?>/js/script.js"></script>
    <title><?php echo SITENAME; ?></title>
</head>
<body>
    <div class="wrapper">
        <?php     
        if(!isset($_GET["url"]) || !str_contains($_GET["url"], "watch")):
        require APPROOT . "/views/includes/nav.php";
        endif;?>