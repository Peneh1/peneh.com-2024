<?php include 'db.php';
	
	$sql = "select * from Customer";
	
	$rows = $db->query($sql);
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

<h2>Customers</h2>

<table>
  <tr>
    <th>First Name</th>
    <th>Last Name</th>
    <th>Email</th>
    <th>Phone Number</th>
    <th>Address</th>
	  <th>City</th>
    <th>State</th>
    <th>Zip Code</th>
    <th>Edit</th>
    <th>Delete</th>
  </tr>
	<?php while ($row = $rows ->fetch_assoc()): ?>
  <tr>
    <td><?php echo $row['firstName'];?></td>
    <td><?php echo $row['lastName'];?></td>
    <td><?php echo $row['email'];?></td>
	  <td><?php echo $row['phone'];?></td>
    <td><?php echo $row['address'];?></td>
    <td><?php echo $row['city'];?></td>
	  <td><?php echo $row['state'];?></td>
    <td><?php echo $row['zip'];?></td>
    <td><a href="edit.php?id=<?php echo $row['id'];?>">Edit</a></td>
	  <td><a href="delete.php?id=<?php echo $row['id'];?>">Delete</a></td>
  </tr> 
 <?php endwhile; ?>
    
</table>

</body>
</html>
