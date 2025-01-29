<?php
include 'db.php';
$file_name = "ser45rgtfcgv/" . $_GET['file_name'];
//delete file from dir
unlink($file_name);

$id = $_GET['id'];
//delete from server
$sql = "DELETE FROM preview WHERE id = '$id' ";
$val = $db->query($sql);
if($val){

header('Location: ' . $_SERVER['HTTP_REFERER']);
}
?>

