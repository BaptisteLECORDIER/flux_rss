<?php 

    function if_condition_is_true ($condition, $response_true, $response_false) {
        if ($condition) { 
            return $response_true;
        } 

        else {
            return $response_false;
        }
    }

    function if_var_exist_and_not_null ($var, $response_true, $response_false) {
        if (isset($var) && $var != '') { 
            return $response_true;
        } 

        else {
            return $response_false;
        }
    }

    function if_var_get_exist_and_not_null ($var, $response_true, $response_false)

    {
        if (isset($_GET[$var]) && $_GET[$var] != '') 
                
        { 
            return $response_true;
        } 

        else 

        {
            return $response_false;
        }
    }

    function if_var_post_exist_and_not_null ($var, $response_true, $response_false)

    {
        if (isset($_POST[$var]) && $_POST[$var] != '') 
                
        { 
            return $response_true;
        } 

        else 

        {
            return $response_false;
        }
    }

    function if_var_session_exist_and_not_null ($var, $response_true, $response_false)

    {
        if (isset($_SESSION[$var]) && $_SESSION[$var] != '') 
                
        { 
            return $response_true;
        } 

        else 

        {
            return $response_false;
        }
    }

    function return_session_if_exist_and_not_null ($var)

    {
        if (isset($_SESSION[$var]) && $_SESSION[$var] != '') 
                
        { 
            return $_SESSION[$var];
        } 

        else 

        {
            return;
        }
    }

    function if_var_cookie_exist_and_not_null ($var, $response_true, $response_false)

    {
        if (isset($_COOKIE[$var]) && $_COOKIE[$var] != '') 
                
        { 
            return $response_true;
        } 

        else 

        {
            return $response_false;
        }
    }
    
    function if_datas_exist_in_db ($datas_to_connect, $table, $datas_to_verify, $id)
    
    {

        $datas_in_tab = get_datas_from_db ($datas_to_connect, $table);
        $to_return = false;
        
        foreach($datas_in_tab as $datas)

        {
            $control = true;

            foreach($datas as $key => $data)

            {

                if ($key != $id) 

                {



                    if ($data != $datas_to_verify[$key])
                        
                    {

                        $control = false;
                    }

                }

            };
            
            if ($control) {
                $to_return = true;
            }

        }
        return $to_return;

    }

    function return_cookie_if_exist_and_not_null ($var)

    {
        if (isset($_COOKIE[$var]) && $_COOKIE[$var] != '') 
                
        { 
            return $_COOKIE[$var];
        } 

        else 

        {
            return;
        }
    }

?> 