<?php require '../db.php';

if($_GET['query']){
	
	$query = $_GET['query']; 

	$sql2 = "select * from tasks WHERE title LIKE '%".$query."%' OR notes LIKE '%".$query."%' ";
		$rows = $db->query($sql2);

		

    
}else{
	
	$sql = "select * from tasks";
	
	$rows = $db->query($sql);
  
  	$sql3 = "select * from task_users";
	
	$users = $db->query($sql3);
}
	?>

<!DOCTYPE html>
<html>
<head>
<style>
table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

td, th {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;
}

tr:nth-child(even) {
  background-color: #dddddd;
}
</style>
</head>
<body>

<h2 style="float: left">Report</h2><a style="float: right; text-decoration: none" href="index.php">Back to Tasks</a>
	<form action="" method="GET">
		<input type="text" name="query" />
		<input type="submit" value="Search" />
	</form>
    
    
  <h5>Tasks</h5>
<table>
  <tr>
    <th>Created</th>
    <th>Title</th>
    <th>Notes</th>
    <th>Assigned to</th>
    <th>Completed</th>
	  <th>Took to Completed</th>
	  <th>Delete</th>
  </tr>
	<?php while ($row = $rows ->fetch_assoc()): ?>
  <tr>
    <td><?php echo $row['created'];?></td>
    <td><?php echo $row['title'];?></td>
    <td><?php echo $row['notes'];?></td>
     <?php   $user_id = $row['user_id'];
    $sql4 = "SELECT task_users.* FROM task_users, tasks WHERE '$user_id' = task_users.user_id LIMIT 1";
    $colors = $db->query($sql4);
    while($task_user = $colors ->fetch_assoc()){
    
    echo "<td>". $task_user['name']."</td>";
    } ?>
    <td><?php echo $row['finished'];?></td>
	      <td><?php $date1=date_create($row['created']);
$date2=date_create($row['finished']);
$diff=date_diff($date1,$date2);
echo $diff->format("%a days %h hours %i minutes");?></td>

    <td><a href="delete.php?id=<?php echo $row['id'];?>">Delete</a></td>
  </tr> 
 <?php endwhile; ?>
    
</table>
  <h5>Users</h5>
  <table>
  <tr>
    <th>Name</th>
    <th>Color</th>
  	  <th>edit</th>
	  <th>Delete</th>
  </tr>
	<?php while ($user = $users ->fetch_assoc()): ?>
  <tr>
    <td><?php echo $user['name'];?></td>
    <td><?php echo $user['color'];?></td>
       <td><a href="edit.php?user_id=<?php echo $user['user_id'];?>">Edit</a></td>
<td><a href="delete.php?user_id=<?php echo $user['user_id'];?>">Delete</a></td>

  </tr> 
 <?php endwhile; ?>
    
</table>

</body>
</html>