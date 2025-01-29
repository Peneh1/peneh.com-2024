<?php 
include 'variables.php';
?>
<title>Get My Info</title>
<?php foreach($info as $item){ ?>
<h5><?php echo "Question:  $item[Q]";?></h5>
<p><?php  echo "Answer: <b>$item[A]</b>";?></p>
<hr>

<?php } ?>