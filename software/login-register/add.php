<?php

 include 'db.php';

if (isset ($_POST['submit'])){

	$firstName = $_POST['firstName'];
	
	$lastName = $_POST['lastName'];
	
	$phone = $_POST['phone'];
	
	$email = $_POST['email'];
	
	$address = $_POST['address'];
	
	$city = $_POST['city'];
	
	$state = $_POST['state'];
	
	$zip= $_POST['zip'];
	
	$password = $_POST['psw'];
	
$sql = "INSERT INTO `Customer` (`firstName`, `lastName`, `phone`, `email`, `address`, `city`, `state`, `zip`, `password`) VALUES ('$firstName', '$lastName', '$phone', '$email', '$address', '$city', '$state', '$zip', '$password')";
	
$val = $db->query($sql);
	if($val){
		echo "<h1>welcome to Peneh, $firstName You successfully registered</h1><p>You can now login to yout account <a href='login.php'>Login</a></p>";
	}
}


?>





