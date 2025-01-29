<?php

 include '../db.php';

$id = $_GET['id'];
	
	$sql = "UPDATE  tasks 
	SET done = 1,
			finished = current_timestamp()
	where id = '$id' ";

$val = $db->query($sql);
	if($val){
	header('location: index.php');
}

?>