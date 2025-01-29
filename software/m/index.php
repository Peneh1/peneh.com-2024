<?php
require '../db.php';
$sql_z = 'select * from mishnies_zrueim';
$sql_m = 'select * from mishnies_moed';
$sql_n = 'select * from mishnies_nushim';
$sql_nz = 'select * from mishnies_nizikin';
$sql_k = 'select * from mishnies_kudeshim';
$sql_t = 'select * from mishnies_teharus';
//run my SQL Query
$z  = $db->query($sql_z); 
$m  = $db->query($sql_m);
$n  = $db->query($sql_n);
$nz  = $db->query($sql_nz);
$k  = $db->query($sql_k);
$t  = $db->query($sql_t);

?>

<html lang="en">
	<head>
		<title>חברה משניות ד'משפחת קאסירער</title>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
	
		<link rel="stylesheet" type="text/css" href="main.css">
		<link href="https://fonts.googleapis.com/css?family=Suez+One&display=swap" rel="stylesheet">
	
	</head>
	<body>
		<h1 class="mishnies">משניות</h1><p style="font-weight: bold">לע"נ ר' עזריאל בן ר' אליהו ע"ה  ~  ולע"נ שרה רינה בת רחמים ע"ה</p>
      <p>יארצייט: כ"ט חשון ~ ז"ך כסלו</p>
		<h1 class="mishnies">קאסירער</h1>

	
	
		
	
	
		<div class="button btn1">זרעים</div>
	
	<div class="table1">
	<div class="limiter">
			<div class="container-table100">
				<div class="wrap-table100">
						<div class="table">
	<?php foreach($z as $zruim){?>
                    <div class="row" ><div class="cell"><?php echo "$zruim[phone_number]";?></div><div class="cell"><?php echo "$zruim[name]";?></div><div class="cell"><?php echo "$zruim[prkim]";?> פרקים </div><div class="cell"> מסכת <?php echo "$zruim[meschta]";?></div><?php if("$zruim[phone_number]" == NULL){echo " <div class='cell'><a href='edit.php?table=mishnies_zrueim&id=$zruim[id]'><img src='edit.png' width='20px'></a></div>";}?>	</div>
	<?php } ?>
						
						
						</div>
				</div>
			</div>
		</div>
	</div>
	 
	<!--end table-->
	
	
	
	
	
	<div class="button btn2">מועד</div>
	
	<div class="table2">
	<div class="limiter">
			<div class="container-table100">
				<div class="wrap-table100">
						<div class="table">
	<?php foreach($m as $moed){?>
							<div class="row" ><div class="cell"><?php echo $moed[phone_number];?></div><div class="cell"><?php echo $moed[name];?></div><div class="cell"><?php echo $moed[prkim];?> פרקים </div><div class="cell"> מסכת <?php echo $moed[meschta];?></div><?php if("$moed[phone_number]" == NULL){echo " <div class='cell'><a href='edit.php?table=mishnies_moed&id=$moed[id]'><img src='edit.png' width='20px'></a></div>";}?>	</div>
	<?php } ?>
	
						</div>
				</div>
			</div>
		</div>
	</div>
	 
	<!--end table-->
	
	
	
	
	
	<div class="button btn3">נשים</div>
	
	<div class="table3">
	<div class="limiter">
			<div class="container-table100">
				<div class="wrap-table100">
						<div class="table">
	
								<?php foreach($n as $nushim){?>
							<div class="row" ><div class="cell"><?php echo $nushim[phone_number];?></div><div class="cell"><?php echo $nushim[name];?></div><div class="cell"><?php echo $nushim[prkim];?> פרקים </div><div class="cell"> מסכת <?php echo $nushim[meschta];?> </div>	<?php if("$nushim[phone_number]" == NULL){echo " <div class='cell'><a href='edit.php?table=mishnies_nushim&id=$nushim[id]'><img src='edit.png' width='20px'></a></div>";}?></div>
	<?php } ?>
		
						</div>
				</div>
			</div>
		</div>
	</div>
	 
	<!--end table-->
	
	
	
	
	
	<div class="button btn4">נזיקין</div>
	
	<div class="table4">
	<div class="limiter">
			<div class="container-table100">
				<div class="wrap-table100">
						<div class="table">
	
								<?php foreach($nz as $nizikin){?>
							<div class="row" ><div class="cell"><?php echo $nizikin[phone_number];?></div><div class="cell"><?php echo $nizikin[name];?></div><div class="cell"> <?php echo $nizikin[prkim];?> פרקים</div><div class="cell"> מסכת <?php echo $nizikin[meschta];?></div><?php if("$nizikin[phone_number]" == NULL){echo " <div class='cell'><a href='edit.php?table=mishnies_nizikin&id=$nizikin[id]'><img src='edit.png' width='20px'></a></div>";}?>	</div>
	<?php } ?>
		
							
						</div>
				</div>
			</div>
		</div>
	</div>
	 
	<!--end table-->
	
	
	
	
	
	<div class="button btn5">קדשים</div>
	
	<div class="table5">
	<div class="limiter">
			<div class="container-table100">
				<div class="wrap-table100">
						<div class="table">
	
							<?php foreach($k as $kudushim){?>
							<div class="row" ><div class="cell"><?php echo $kudushim[phone_number];?></div><div class="cell"><?php echo $kudushim[name];?></div><div class="cell"> <?php echo $kudushim[prkim];?> פרקים</div><div class="cell">מסכת <?php echo $kudushim[meschta];?>  </div><?php if("$kudushim[phone_number]" == NULL){echo " <div class='cell'><a href='edit.php?table=mishnies_kudushim&id=$kudushim[id]'><img src='edit.png' width='20px'></a></div>";}?>	</div>
	<?php } ?>
		
							
						</div>
				</div>
			</div>
		</div>
	</div>
	 
	<!--end table-->
	
	
	
	
	
	<div class="button btn6">טהרות</div>
	
	<div class="table6">
	<div class="limiter">
			<div class="container-table100">
				<div class="wrap-table100">
						<div class="table">
	
								<?php foreach($t as $teharus){?>
							<div class="row" ><div class="cell"><?php echo $teharus[phone_number];?></div><div class="cell"><?php echo $teharus[name];?></div><div class="cell"> <?php echo $teharus[prkim];?> פרקים</div><div class="cell">מסכת <?php echo $teharus[meschta];?>  </div><?php if("$teharus[phone_number]" == NULL){echo " <div class='cell'><a href='edit.php?table=mishnies_teharus&id=$teharus[id]'><img src='edit.png' width='20px'></a></div>";}?>	</div>
	<?php } ?>
	
						</div>
				</div>
			</div>
		</div>
	</div>
	 
	<!--end table-->
	  <p style="color:gray"> <br>:צו לערנען משניות אדער צו מאכן א טויש ביטע רופט
		<br>יואל קאסירער: <a style="text-decoration: none;" href="tel:8453001012">845-300-1012</a>
        <br>יעקב נפתלי קאסירער: <a style="text-decoration: none;" href="tel:3474861135">347-486-1135</a>
		<br><br><br>אין טובה גדולה שאפשר לעשות למען נשמה מלומד משניות<br></p>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script>
	$(document).ready(function(){
	  $(".btn1").click(function(){
		$(".table1").toggle();
	  });
	});
	
	$(document).ready(function(){
	  $(".btn2").click(function(){
		$(".table2").toggle();
	  });
	});
	
	$(document).ready(function(){
	  $(".btn3").click(function(){
		$(".table3").toggle();
	  });
	});
	
	$(document).ready(function(){
	  $(".btn4").click(function(){
		$(".table4").toggle();
	  });
	});
	
	$(document).ready(function(){
	  $(".btn5").click(function(){
		$(".table5").toggle();
	  });
	});
	
	$(document).ready(function(){
	  $(".btn6").click(function(){
		$(".table6").toggle();
	  });
	});
	</script>
			</body>
		   </html>  