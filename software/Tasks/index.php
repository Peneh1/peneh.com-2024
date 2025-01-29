<?php require '../db.php';
	/*
   #### CREATE TABLE#################
    CREATE TABLE `peneh`.`tasks` ( `id` INT NOT NULL AUTO_INCREMENT , `created` VARCHAR(20) NOT NULL , `title` VARCHAR(50) NOT NULL , `notes` VARCHAR(200) NOT NULL , `assign` VARCHAR(20) NOT NULL , `color` VARCHAR(20) NOT NULL , `done` TINYINT NOT NULL , `finished` VARCHAR(20) NOT NULL , PRIMARY KEY (`id`)) ENGINE = InnoDB;
    ############END TABLE ###############
    
    #########CREATE TABLE FOR USERS###########
    CREATE TABLE `peneh`.`task_users` ( `id` INT NOT NULL AUTO_INCREMENT , `user_id` VARCHAR(20) NOT NULL , `name` VARCHAR(20) NOT NULL , `color` VARCHAR(20) NOT NULL , PRIMARY KEY (`id`)) ENGINE = InnoDB;
    ##############END TABLE#######################
    */
	

if(isset($_GET['submit'])){
	$seeOnly  = $_GET['seeOnly'];
	$sql2 = "select * from tasks WHERE done = 0 AND user_id = '$seeOnly' ";
		$rows = $db->query($sql2);
		
} else {
	$sql = "select * from tasks WHERE done = 0";
	
	$rows = $db->query($sql);
}

$sql3 = "select * from task_users";
	
	$users = $db->query($sql3);
?>

<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<style>
	.tasks{
		border: 1px solid black;
		border-radius: 7px;
		width: 300px;
		max-width: 90vw;
		margin: 10px;
		float: left;
	}
	.header{
		display: flex;
		justify-content: space-between;
		border-bottom: 3px solid gray;
		padding: 10px 20px;
	}

	.dropbtn {
  background-color: #8EBC90;
  color: white;
  padding: 16px;
  font-size: 16px;
  border: none;
  cursor: pointer;
}

.dropdown {
  position: relative;
  display: inline-block;
}

.dropdown-content {
  display: none;
  position: absolute;
  background-color: #f9f9f9;
  min-width: 160px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
}

.dropdown-content a {
  color: black;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
}

.dropdown-content a:hover {background-color: #f1f1f1}

.dropdown:hover .dropdown-content {
  display: block;
}

.dropdown:hover .dropbtn {
  background-color: #3e8e41;
}
</style>
</head>
	<body>



  <!-- Modal -->
  
  




<div class="header"><h5>Bright Solutions - To Do List</h5>
	<a href="add-task.php">Add Task</a>
	<a class="btn btn-default" href="report.php">Run Report</a>
	<form><label for="cars">See only asigned to:</label>
<select class="dropbtn" name="seeOnly" required>
	<option value=""></option>
  <?php while ($user = $users ->fetch_assoc()): ?>
  <option value="<?php echo $user['user_id']; ?>"><?php echo $user['name']; ?></option>
   <?php endwhile; ?>
	<input type="submit"  name="submit" value="Filter" class="btn btn-default">
	
	</form> </div>




	<?php while ($row = $rows ->fetch_assoc()){ ?>
  <div class="tasks">
      <?php
      $user_id = $row['user_id'];
    $sql4 = "SELECT task_users.* FROM task_users, tasks WHERE '$user_id' = task_users.user_id LIMIT 1";
    $colors = $db->query($sql4);
    while($task_user = $colors ->fetch_assoc()){
    
    echo "<h5 style='background-color:". $task_user['color'] ."'>
    
    Assigned to ". $task_user['name'] . "</h5>";
    }
      ?>
	  <h3><?php echo $row['title'];?> </h3>
    <p><?php echo $row['notes'];?></p>
	 
	      <button><a styly="float: left;" href="done.php?id=<?php echo $row['id'];?>">Done</a></button>
  </div> 
 <?php }?>
    


</body>
</html>
