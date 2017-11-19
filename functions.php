<?php 

 function add($table = null, $fields = array()) {


        $host_name = 'localhost';
        $database = 'database';
        $username = 'root';
        $password = '';
        try {
            $db = new PDO("mysql:host=".$host_name.";dbname=".$database, $username, $password);
            $db->exec("set names utf8");
        } catch (Exception $ex) {
            echo "Database Connection Error ". $ex->getMessage();exit;
        }

        $table_fields = '';
        $field_binds = '';

        $return_message = array('success' => true);

        $fields_count = count($fields);
        $i = 1;
        $put_coma = ", ";

        foreach ($fields as $field => $value) {
            if ($i == $fields_count) {
                $put_coma = "";
            }
            $table_fields .=  "`" .$field ."`" . $put_coma;
            $field_binds .= "'" . $value ."'" . $put_coma;
            $i++;
        }

        $stmt =$db->prepare("INSERT INTO " . $table . " (" . $table_fields . ") VALUES (" . $field_binds . ")");

       
       
        if ($stmt->execute()) {
            return $return_message;
        } else {
            $return_message = array(
                'success' => false,
                'error_code' => $db->errorInfo()
            );
            return $return_message;
        }
    }


function edit($table = null, $fields = array(), $id = array()) {
       
        $host_name = 'localhost';
        $database = 'database';
        $username = 'root';
        $password = '';
        try {
            $db = new PDO("mysql:host=".$host_name.";dbname=".$database, $username, $password);
            $db->exec("set names utf8");
        } catch (Exception $ex) {
            echo "Database Connection Error ". $ex->getMessage();exit;
        }

        $table_fields = '';
        $return_message = array('success' => true);

        $fields_count = count($fields);
        $i = 1;
        $put_coma = ", ";
        
        foreach ($fields as $field => $value) {
            if ($i == $fields_count) { $put_coma = ""; }
            $table_fields .= "`".$field."`='". $value ."'". $put_coma;
            $i++;
        }

        $query = "UPDATE " . $table . " SET " . $table_fields . " WHERE " . $id['id_field'] . " = " . $id['id_value'];

        $stmt =$db->prepare($query);
          
  
        if ($stmt->execute()) {
            return $return_message;
        } else {
            $return_message = array(
                'success' => false,
                'error_code' => $db->errorInfo()
            );
            return $return_message;
        }
    }

function delete($table = null, $id_params = array()) {


        $host_name = 'localhost';
        $database = 'database';
        $username = 'root';
        $password = '';
        try {
            $db = new PDO("mysql:host=".$host_name.";dbname=".$database, $username, $password);
            $db->exec("set names utf8");
        } catch (Exception $ex) {
            echo "Database Connection Error ". $ex->getMessage();exit;
        }



        $field_name = $id_params['field_id'];
        $field_value = $id_params['field_value'];
        $return_message = array('success' => true);

        $sql = "DELETE FROM " . $table . " WHERE " . $field_name . " = :row_id";
        $stmt =$db->prepare($sql);
        $stmt->bindParam(':row_id', $field_value, PDO::PARAM_INT);

        if ($stmt->execute()) {
            return $return_message;
        } else {
            $return_message = array(
                'success' => false,
                'error_code' => $db->errorInfo()
            );
            return $return_message;
        }
    }







 ?>