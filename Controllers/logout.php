<?php 
    require_once('../Functions/get_url.php');
    session_start();
    session_destroy();
    header ("Location: ".get_url_base ()."/index.php");






?>