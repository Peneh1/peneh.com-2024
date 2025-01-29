<?php
$_SESSION['username'] = $_POST['username'];
$_SESSION['redirect'] = 'home.php';
header("location: ../index.php")
?>