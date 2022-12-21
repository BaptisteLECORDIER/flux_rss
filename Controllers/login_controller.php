<?php 
    session_start();
    require_once('../Models/crud_model.php');
    require_once('../Functions/get_url.php');
    require_once('../Functions/if_var_exist_functions.php');

    $newCrud = new crud;
    $usersTab = $newCrud->read($datas_to_connect, "users");


    if(isset($_POST["user_email"]) && isset($_POST["user_password"])) {
        $datas_to_verify = [
            "user_email" => $_POST["user_email"],
            "user_password" => $_POST["user_password"],
        ];

        if (if_datas_exist_in_db ($datas_to_connect, "users", $datas_to_verify, "user_id")) {
            echo 'yes';
            $_SESSION["user_email"] = "".$_POST["user_email"]."";
            $_SESSION["user_password"] = "".$_POST["user_password"]."";
            header ("Location: ".get_url_base ()."/index.php");
        } else {
            echo 'nonono';
            header ("Location: ".get_url_base ()."/index.php?page=login");
        }


    } else {
        echo 'no';
        header ("Location: ".get_url_base ()."/index.php?page=login");
    }







?>