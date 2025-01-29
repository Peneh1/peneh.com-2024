<?php
session_start();


if($_SERVER['HTTP_HOST'] == 'localhost'){
    //local host
  $host_name = 'localhost';
  $database = 'peneh_chat';
  $user_name = 'root';
  $password = '';
  $db = null;

} else{
    //live server
  $host_name = 'db5002167729.hosting-data.io';
  $database = 'dbs1754169';
  $user_name = 'dbu498257';
  $password = '29Kasirer,';
  $db = null;

}
 
  try {
    $db = new PDO("mysql:host=$host_name; dbname=$database;", $user_name, $password);
  } catch (PDOException $e) {
    echo "Error2!: " . $e->getMessage() . "<br/>";
    die();
  }
?>