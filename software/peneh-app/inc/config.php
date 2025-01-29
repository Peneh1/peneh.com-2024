<?php

if($_SERVER['HTTP_HOST'] == 'localhost'){
    //local host
  $host_name = 'localhost';
  $database = 'peneh_app';
  $user_name = 'root';
  $password = '';
  $db = null;
$opt = [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES => false
];
} else{
    //live server
  $host_name = 'db5002167729.hosting-data.io';
  $database = 'dbs1754169';
  $user_name = 'dbu498257';
  $password = '29Kasirer,';
  $db = null;
$opt = [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_SILENT,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES => false
];
}
 
  try {
    $db = new PDO("mysql:host=$host_name; dbname=$database;", $user_name, $password);
  } catch (PDOException $e) {
    echo "Error!: " . $e->getMessage() . "<br/>";
    die();
  }
?>
