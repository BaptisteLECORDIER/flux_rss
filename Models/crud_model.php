<?php

    require_once('../Datas/datas_db.php');
    require_once('../Functions/crud_functions.php');
    

    class crud {

        public function read($datas_to_connect, $table) {
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

        public function create($datas_to_connect, $datas_without_id, $table, $id_table) {
            add_datas_to_db_with_generated_id ($datas_to_connect, $datas_without_id, $table, $id_table);
        }

        public function modify($datas_to_connect, $datas, $table, $condition) {
            modify_datas_to_db($datas_to_connect, $datas, $table, $condition);
        }

        public function delete($datas_to_connect, $table, $condition, $id_table) {
            remove_datas_to_db_with_id_update ($datas_to_connect, $table, $condition, $id_table);
        }
    };



?>