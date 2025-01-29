<?php

 include '../db.php';

$user_id = $_GET['user_id'];

$sql = "select * from task_users where user_id = '$user_id'";

$rows = $db->query($sql);

$row = $rows->fetch_assoc();

if (isset ($_POST['submit'])){

	$name = $_POST['name'];
	
	$color = $_POST['color'];

	
$sql2 = "UPDATE task_users 
		set name = '$name',
            color = '$color'
       		where user_id = '$user_id'";
	
$val = $db->query($sql2);
	if($val){
		header('location: report.php');
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
    <hr>    <label for="exampleInputEmail1">Name</label>
    <input type="text" class="form-control" required name="name" value="<?php echo $row['name']?>">
 <label for="color"><b>Color</b></label>
<select  name="color" required>
	<option value="<?php echo $row['color'];?>"><?php echo $row['color'];?></option>
  <option value="silver">silver</option>
  <option value="maroon">maroon</option>
	<option value="red">red</option>
  <option value="purple">purple</option>
	<option value="green">green</option>
  <option value="lime">lime</option>
	<option value="olive">olive</option>
  <option value="yellow">yellow</option>
	<option value="blue">blue</option>
  <option value="aqua">aqua</option>
  
</select>   
    

  

  <button type="submit" name="submit" class="registerbtn">Update</button>
	   </div>
</form>