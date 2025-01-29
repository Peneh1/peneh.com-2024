<?php

 include 'db.php';

$id = $_GET['id'];

$sql = "select * from Customer where id = '$id'";

$rows = $db->query($sql);

$row = $rows->fetch_assoc();

if (isset ($_POST['submit'])){

	$firstName = $_POST['firstName'];
	
	$lastName = $_POST['lastName'];
	
	$phone = $_POST['phone'];
	
	$email = $_POST['email'];
	
	$address = $_POST['address'];
	
	$city = $_POST['city'];
	
	$state = $_POST['state'];
	
	$zip= $_POST['zip'];
	
$sql2 = "UPDATE Customer 
		set firstName = '$firstName',
            lastName = '$lastName',
            phone = '$phone',
            address = '$address',
            city = '$city',
            state = '$state',
            zip = '$zip'
		where id = '$id'";
	
$val = $db->query($sql2);
	if($val){
		header('location: admin.php');
	}
}


?>

<style>
body {
  font-family: Arial, Helvetica, sans-serif;
  background-color: black;
}

* {
  box-sizing: border-box;
}

/* Add padding to containers */
.container {
  padding: 16px;
  background-color: white;
	max-width: 500px;
	margin: auto;
}

/* Full-width input fields */
input[type=text], input[type=password], input[type=email]{
  width: 100%;
  padding: 15px;
  margin: 5px 0 22px 0;
  display: inline-block;
  border: none;
  background: #f1f1f1;
}

input[type=text]:focus, input[type=password]:focus, input[type=email]:focus{
  background-color: #ddd;
  outline: none;
}

/* Overwrite default styles of hr */
hr {
  border: 1px solid #f1f1f1;
  margin-bottom: 25px;
}

/* Set a style for the submit button */
.registerbtn {
  background-color: #4CAF50;
  color: white;
  padding: 16px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 100%;
  opacity: 0.9;
}

.registerbtn:hover {
  opacity: 1;
}

/* Add a blue text color to links */
a {
  color: dodgerblue;
}

/* Set a grey background color and center the text of the "sign in" section */
.signin {
  background-color: #f1f1f1;
  text-align: center;
}
</style>

<form method="post" action="">
	
 <div class="container">
    <h1>Edit</h1>
    <hr>    <label for="exampleInputEmail1">First Name</label>
    <input type="text" class="form-control" required name="firstName" value="<?php echo $row['firstName']?>">
     <label for="exampleInputEmail1">Last Name</label>
    <input type="text" class="form-control" required name="lastName" value="<?php echo $row['lastName']?>">
     <label for="exampleInputEmail1">Email</label>
    <input type="text" class="form-control" required name="email" value="<?php echo $row['email']?>">
     <label for="exampleInputEmail1">Phone Number</label>
    <input type="text" class="form-control" required name="phone" value="<?php echo $row['phone']?>">
     <label for="exampleInputEmail1">Address</label>
    <input type="text" class="form-control" required name="address" value="<?php echo $row['address']?>">
     <label for="exampleInputEmail1">City</label>
    <input type="text" class="form-control" required name="city" value="<?php echo $row['city']?>">
     <label for="exampleInputEmail1">State</label>
    <input type="text" class="form-control" required name="state" value="<?php echo $row['state']?>">
     <label for="exampleInputEmail1">	Zip Code</label>
    <input type="text" class="form-control" required name="zip" value="<?php echo $row['zip']?>">
    

  

  <button type="submit" name="submit" class="registerbtn">Update</button>
	   </div>
</form>