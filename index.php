<?php 
    ini_set('display_errors', 1);
    error_reporting(E_ALL);


    if (!empty($_GET['page'])){
        $page = $_GET['page'];
        // var_dump($page);
    } else {
        $page = 'home';
    }

    

    require_once 'parts/header.php';

    if (file_exists("./view/{$page}.php")){
        require_once "./view/{$page}.php";
    } else {
        require_once "./view/404.php";
    }

    require_once 'parts/footer.php';