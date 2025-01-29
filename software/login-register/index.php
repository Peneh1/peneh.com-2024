<?php
session_start();

include 'db.php';

if(isset($_POST['submit'])){
	
	$email = $_POST['email'];
	$password = $_POST['password'];
	
	$sql = "SELECT * FROM Customer WHERE email = '$email' AND password = '$password' LIMIT 1";
	
	$rows = $db->query($sql);
		
if ($rows->num_rows == 0) {
			
					echo "Yoe dont have an acount wth us, Please <a href='register.php'>Register</a>";
		}
	
	
} else {
	header('location: login.php');
}
?>

<div>
		<?php while ($row = $rows ->fetch_assoc()): ?>
	<h5 style="border: solid 1px green">Hi <span><?php echo $row['firstName'];?></span>  You have Successfully Loged In </h5>
		<?php endwhile; ?>
	</div>
<?php echo $_SESSION['name']; ?>
	
	
	