<?php
require '../db.php';

if(isset($_POST['submit']))
{
	$title = $_POST['taskTitle'];
	$notes = $_POST['notes'];
$assign = $_POST['assignTo'];
	$color = $user['color'];

$sql = "INSERT INTO `tasks` (`id`, `created`, `title`, `notes`, `assign`, `done`, `finished`) 
VALUES (NULL, current_timestamp, '$title', '$notes', '$assign', '0', NULL)";
$added = $db->query($sql);
	
if($added){
	header('location: index.php');
}
}
$sql3 = "select * from users";
	
	$users = $db->query($sql3);	
	?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">

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
</head>
<body>

<form action="" method="post">
  <div class="container">
    <h1>Add Task</h1>
   
    <hr>
  <label for="taskTitle">Task Title</label><br>
  <input type="text"  name="taskTitle" required><br>
  <label for="notes">Notes <small>(optinal)</small></label><br>
  <textarea type="text"  name="notes" ></textarea> <br><br>
	<label for="cars">Assign to:</label>
<select id="cars" name="assignTo" required>
	<option value=""></option>
	<?php while ($user = $users ->fetch_assoc()): ?>
  <option value="<?php echo $user['name']; ?>"><?php echo $user['name']; ?></option>
   <?php endwhile; ?>

</select><a href="add_user.php">Add new user</a><br>
  <input type="submit" name="submit" value="Create Task" class="btn btn-success">
</form>


  </div>
  
  
</form>

</body>
</html>
