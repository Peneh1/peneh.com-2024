<?php
require 'db.php';
$id = $_GET['id'];
$sql = "select * from drt_user where user_id =$id";
    
 $user_info =  $db->query($sql);

?>

     <link href="style.css" rel="stylesheet">




<?php while($user = $user_info ->fetch_assoc()):?>
<form class="wrapper">
	
	
	<div class="profile">
		
		<div class="check"><i class="fas fa-check"></i></div>
		<h3 class="name"><?php echo $user['first_name']." ". $user['last_name'];?></h3>
		<p class="description">You can contact me regarding the doctor I had experience.</p>
		<a href="tel:<?php echo $user['tel'];?>" type="button" class="btn">Call me </a> Or
        <a href="mailto:<?php echo $user['email'];?>" type="button" class="btn">Email  me </a>
	</div>
	
	
</form>
<?php endwhile;?>

    