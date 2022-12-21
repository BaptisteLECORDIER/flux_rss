<?php  

    // ---------------------------------------------------------------------------------------------------
    // xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx
    // ---------------------------------------------------------------------------------------------------

    /**
     * FR : Retourne l'url de la page
     * EN : Return url of the page
     * @return string
     */

    function get_url () {

        if (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on') {   
            $urlProtocol = "https://";
        } 
        
        else {
            $urlProtocol = "http://";
        } 

        $urlHost = $_SERVER['HTTP_HOST'];
        $urlURI  = $_SERVER['REQUEST_URI'];

        return $urlProtocol.$urlHost.$urlURI;

    }

    // ---------------------------------------------------------------------------------------------------
    // xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx
    // ---------------------------------------------------------------------------------------------------

    /**
     * FR : Retourne l'url détaillée de la page
     * EN : Return detail url of the page
     * @return string
     */

    function get_url_detail () {

        if (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on') {   
            $urlProtocol = "https://";
        } 
        
        else {
            $urlProtocol = "http://";
        } 

        $urlHost      = $_SERVER['HTTP_HOST'];
        $urlURIdetail = $_SERVER['SCRIPT_NAME'];
        
        return $urlProtocol.$urlHost.$urlURIdetail;

    }

    // ---------------------------------------------------------------------------------------------------
    // xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx
    // ---------------------------------------------------------------------------------------------------

    function get_url_base () {

        if (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on') {   
            $urlProtocol = "https://";
        } 
        
        else {
            $urlProtocol = "http://";
        } 

        $urlHost = $_SERVER['HTTP_HOST'];

        
        return $urlProtocol.$urlHost;

    }




?>   