<?php

 include 'db.php';

$id = $_GET['id'];
	
	$sql = "delete from Customer where id = '$id' ";

$val = $db->query($sql);
	if($val){
	header('location: admin.php');
}

?>