<?php

 include '../db.php';

$id = $_GET['id'];
$user_id = $_GET['user_id'];
	
	$sql = "delete from tasks where id = '$id';
			delete from task_users where user_id = '$user_id' ";

$val = $db->multi_query($sql);
	if($val){
	header('location: report.php');
}

?>