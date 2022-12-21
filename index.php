<?php 
    if(isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on')   
             $url_server = "https://";   
        else  
             $url_server = "http://";   

        $url_host = $_SERVER['HTTP_HOST'];   
        $url_self = $_SERVER['REQUEST_URI'];     
        $url = $url_server.$url_host.$url_self;  

    switch ($url_self) {

        case "/" :
            include_once("./Views/home.php");
            break;

        case "/index.php" :
            include_once ("./Views/home.php");
            break;

        case "/index.php?page=register" :
            include_once ("./Views/register.php");
            break;

        case "/index.php?page=login" :
            include_once ("./Views/login.php");
            break;

        case "/index.php?page=logout" :
            include_once ("./Views/logout.php");
            break;

        case "/index.php?page=confirm" :
            include_once ("./Views/confirm.php");
            break;

        case "/index.php?page=profil" :
            include_once ("./Views/profil.php");
            break;
        
        case "/index.php?page=forgot" :
            include_once ("./Views/forgot.php");
            break;

        default :
            include_once ("./Views/erreur_404.php");
            break;
    }

    //echo $url_self;



?>