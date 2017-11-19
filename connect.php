<?php
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

function sql_query( $sql)
{
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

  $stmt_pages = $db->prepare($sql);
  $stmt_pages->execute();
  $pages = $stmt_pages->fetchAll();
  $stmt_pages->closeCursor();
         return  $pages;
}
?>