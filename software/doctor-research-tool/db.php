<?php 

$db = new MySQLi;
$db_address = "localhost";
$db_userName = "root";
$db_password = "";
$db_name = "doctor_research_tool";

$db-> connect($db_address,$db_userName,$db_password, $db_name);




?>