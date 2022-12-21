<?php

    /**
     * get_datas_from_db ($datas_to_connect, $table)
     * 
     * get_nb_rows_from_db ($datas_to_connect, $table)
     * 
     * get_last_id ($datas_to_connect, $table, $id)
     * 
     * send_request_to_db ($datas_to_connect, $sql) 
     * 
     * add_datas_to_db ($datas_to_connect, $datas, $table)
     * 
     * modify_datas_to_db($datas_to_connect, $datas, $table, $condition)
     * 
     * add_datas_to_db_with_generated_id ($datas_to_connect, $datas_without_id, $table, $id)
     * 
     * remove_datas_to_db ($datas_to_connect, $table, $condition) 
     * 
     * update_id_table ($datas_to_connect, $table, $id)
     * 
     * remove_datas_to_db_with_id_update ($datas_to_connect, $table, $condition, $id) 
     */


    // ---------------------------------------------------------------------------------------------------
    // xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx
    // ---------------------------------------------------------------------------------------------------

    /**
     * FR : Retourne toutes les données d'une table d'une base de données
     * EN : Return every datas of a table in a database
     * @param array 
     * @param string
     * @return array
     */

    function get_datas_from_db ($datas_to_connect, $table)

    {
        $servername = $datas_to_connect["servername"];
        $username = $datas_to_connect["username"];
        $password = $datas_to_connect["password"];
        $dbname = $datas_to_connect["dbname"];

        $conn = new mysqli($servername, $username, $password, $dbname);
        $result = $conn->query("SELECT * FROM `".$table."`");

        $resultTab = [];

        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                array_push($resultTab, $row) ;
            }
        } 

        return $resultTab;
    }

    // ---------------------------------------------------------------------------------------------------
    // xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx
    // ---------------------------------------------------------------------------------------------------


    function get_datas_with_manual_request ($datas_to_connect, $request)

    {
        $servername = $datas_to_connect["servername"];
        $username = $datas_to_connect["username"];
        $password = $datas_to_connect["password"];
        $dbname = $datas_to_connect["dbname"];

        $conn = new mysqli($servername, $username, $password, $dbname);
        $result = $conn->query($request);

        $resultTab = [];

        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                array_push($resultTab, $row) ;
            }
        } 

        return $resultTab;
    }







    // ---------------------------------------------------------------------------------------------------
    // xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx
    // ---------------------------------------------------------------------------------------------------

    /**
     * FR : Retourne le nombre de colonnes d'une table d'une base de données
     * EN : Return number of rows of a table in a database
     * @param array 
     * @param string
     * @return array
     */

    function get_nb_rows_from_db ($datas_to_connect, $table) 

    {
        $servername = $datas_to_connect["servername"];
        $username = $datas_to_connect["username"];
        $password = $datas_to_connect["password"];
        $dbname = $datas_to_connect["dbname"];
        
        $conn = new mysqli($servername, $username, $password, $dbname);
        $result = $conn->query("SELECT COUNT(*) FROM `".$table."`");

        return ($result->fetch_assoc())['COUNT(*)'];
    }

    // ---------------------------------------------------------------------------------------------------
    // xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx
    // ---------------------------------------------------------------------------------------------------

    /**
     * FR : Retourne le dernier id d'une table d'une base de données
     * EN : Return the last id of a table in a database
     * @param array 
     * @param string
     * @param string
     * @return array
     */

    function get_last_id ($datas_to_connect, $table, $id) 

    {
        $servername = $datas_to_connect["servername"];
        $username = $datas_to_connect["username"];
        $password = $datas_to_connect["password"];
        $dbname = $datas_to_connect["dbname"];

        $conn = new mysqli($servername, $username, $password, $dbname);

        $result = $conn->query("SELECT `".$id."` FROM `".$table."` ORDER BY `".$id."` DESC LIMIT 1;");

        $resultTab = [];

        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                array_push($resultTab, $row) ;
            }
        } 

        if ($resultTab == []) 
        
        {
            return 0;
        }

        else 

        {
            return $resultTab[0][$id];
        }
        
    }

    // ---------------------------------------------------------------------------------------------------
    // xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx
    // ---------------------------------------------------------------------------------------------------

    /**
     * FR : Envoie une requette SQL à d'une base de données
     * EN : Send SQL request to the database
     * @param array 
     * @param string
     */

    function send_request_to_db ($datas_to_connect, $sql) 

    {
        $servername = $datas_to_connect["servername"];
        $username = $datas_to_connect["username"];
        $password = $datas_to_connect["password"];
        $dbname = $datas_to_connect["dbname"];
        
        $conn = new mysqli($servername, $username, $password, $dbname);
        $conn->query($sql);
    }

    // ---------------------------------------------------------------------------------------------------
    // xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx
    // ---------------------------------------------------------------------------------------------------

    /**
     * FR : Ajout de données d'une table d'une base de données
     * EN : Add datas of a table in the database
     * @param array 
     * @param array 
     * @param string
     */

    function add_datas_to_db ($datas_to_connect, $datas, $table) 

    {
        $servername = $datas_to_connect["servername"];
        $username = $datas_to_connect["username"];
        $password = $datas_to_connect["password"];
        $dbname = $datas_to_connect["dbname"];

        $sql_request_to_construct_key = "";
        $sql_request_to_construct_data = "";

        foreach($datas as $key => $data){
            $sql_request_to_construct_key .= $key .",";
            if (is_int($data)) {
                $sql_request_to_construct_data .= $data.", ";
            } else {
                $sql_request_to_construct_data .= "'".$data."', ";
            }
        }
        $sql_request_to_construct_key = substr($sql_request_to_construct_key, 0, -1);
        $sql_request_to_construct_data = substr($sql_request_to_construct_data, 0, -2);

        
        $conn = new mysqli($servername, $username, $password, $dbname);
        $conn->query("INSERT INTO ".$table." (".$sql_request_to_construct_key.") VALUES (".$sql_request_to_construct_data.")");


    }

    // ---------------------------------------------------------------------------------------------------
    // xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx
    // ---------------------------------------------------------------------------------------------------

    /**
     * FR : Modication de données d'une table d'une base de données
     * EN : Modify datas of a table in the database
     * @param array 
     * @param array 
     * @param string
     * @param string
     */

    function modify_datas_to_db($datas_to_connect, $datas, $table, $condition)

    {
        $servername = $datas_to_connect["servername"];
        $username = $datas_to_connect["username"];
        $password = $datas_to_connect["password"];
        $dbname = $datas_to_connect["dbname"];

        $sql_request_to_construct = "";

        foreach($datas as $key => $data){
            if (is_int($data)) {
                $sql_request_to_construct .= $key."=".$data.", ";
            } else {
                $sql_request_to_construct .= $key."='".$data."', ";
            }
        }

        $sql_request_to_construct = substr($sql_request_to_construct, 0, -2);

        $conn = new mysqli($servername, $username, $password, $dbname);
        $conn->query("UPDATE ".$table." SET ".$sql_request_to_construct." WHERE ".$condition);

        //echo "UPDATE ".$table." SET ".$sql_request_to_construct." WHERE ".$condition;

    }

    // ---------------------------------------------------------------------------------------------------
    // xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx
    // ---------------------------------------------------------------------------------------------------

    /**
     * FR : Ajout de données d'une table d'une base de données sans entrer d'id
     * EN : Add datas of a table in the database without enter id
     * @param array
     * @param array  
     * @param string
     * @param string
     */

    function add_datas_to_db_with_generated_id ($datas_to_connect, $datas_without_id, $table, $id) 

    {
        $datas_with_id = [$id => (get_last_id ($datas_to_connect, $table, $id)+1)] + $datas_without_id ;

        add_datas_to_db ($datas_to_connect, $datas_with_id, $table);
    }

    // ---------------------------------------------------------------------------------------------------
    // xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx
    // ---------------------------------------------------------------------------------------------------

    /**
     * FR : Suppression de données d'une table d'une base de données
     * EN : Delete datas of a table in the database
     * @param array 
     * @param string
     * @param string
     */

    function remove_datas_to_db ($datas_to_connect, $table, $condition) 

    {
        $servername = $datas_to_connect["servername"];
        $username = $datas_to_connect["username"];
        $password = $datas_to_connect["password"];
        $dbname = $datas_to_connect["dbname"];

        $conn = new mysqli($servername, $username, $password, $dbname);
        $conn->query("DELETE FROM ".$table." WHERE ".$condition);
    }

    // ---------------------------------------------------------------------------------------------------
    // xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx
    // ---------------------------------------------------------------------------------------------------

    /**
     * FR : Actualisation de l'id d'une table d'une base de données
     * EN : Update id of a table in the database
     * @param array 
     * @param string
     * @param string
     */

    function update_id_table ($datas_to_connect, $table, $id) 
    
    {
        $datas_table = get_datas_from_db ($datas_to_connect, $table);
        $i = 1;
        foreach ($datas_table as $data_table) {
            $data_table_modify = $data_table;
            $data_table_modify[$id] = $i;

            $condition_with_id = $id." = ".$data_table[$id];

            modify_datas_to_db($datas_to_connect, $data_table_modify, $table, $condition_with_id);

            $i++;
        }

    }

    // ---------------------------------------------------------------------------------------------------
    // xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx
    // ---------------------------------------------------------------------------------------------------

    /**
     * FR : Suppression de données avec atualisation de l'id d'une table d'une base de données
     * EN : Delete datas with update of id of a table in the database
     * @param array 
     * @param string
     * @param string
     * @param string
     */

    function remove_datas_to_db_with_id_update ($datas_to_connect, $table, $condition, $id) 

    {
        remove_datas_to_db ($datas_to_connect, $table, $condition);
        
        update_id_table ($datas_to_connect, $table, $id);

    }

    // ---------------------------------------------------------------------------------------------------
    // xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx
    // ---------------------------------------------------------------------------------------------------

?>