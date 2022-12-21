<?php
    require_once('../Models/crud_model.php');
    require_once('../Functions/get_url.php');

    echo get_url_base ();

    if (isset($_POST["user_email"]) && isset($_POST["user_password"]) && isset($_POST["code"]) && isset($_POST["gen_code"])) {
        

        if ($_POST["code"] == $_POST["gen_code"]) {
            
            $newCrud = new crud;

            $datas_without_id_test = [
                "user_email" => $_POST["user_email"],
                "user_password" => $_POST["user_password"],
            ];

            $datas = [
                "user_email" => $_POST["user_email"],
                "new"        => "on",
                "politics"   => "on",
                "society"    => "on",
                "decodeur"   => "on",
                "justice"    => "on",
                "police"     => "on",
                "campus"     => "on",
                "education"  => "on",
                "culture"    => "on",
            ];



            $newCrud->create($datas_to_connect, $datas_without_id_test, "users", "user_id");
            add_datas_to_db ($datas_to_connect, $datas, "preference");



            $test = $newCrud->read($datas_to_connect, "users");
            print_r($test);
            header ("Location: ".get_url_base ()."/index.php");

        } else {

            echo "no no";
            header ("Location: ".get_url_base ()."/index.php?page=register");

        }



    } else {

        echo "no";
        header ("Location: ".get_url_base ()."/index.php?page=register");

    }



    

?>