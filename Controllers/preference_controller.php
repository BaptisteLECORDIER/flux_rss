<?php
    session_start();
    require_once('../Datas/datas_db.php');
    require_once('../Functions/crud_functions.php');
    require_once('../Functions/get_url.php');

    $list = ["new", "politics", "society", "decodeur", "justice", "police", "campus", "education", "culture"];
    $toAdd = ["user_email" => $_SESSION["user_email"]];


    foreach ($list as $element) {
        if (isset($_POST[$element]) && $_POST[$element] == "on") {
            $toAdd += [$element => "on"];
        } else {
            $toAdd += [$element => "off"];
        }
    }

    //print_r($toAdd);
    modify_datas_to_db($datas_to_connect, $toAdd, "preference", "user_email = '".$_SESSION["user_email"]."'");

    header("Location: ".$url_server.$url_host."/index.php?page=profil")

?>