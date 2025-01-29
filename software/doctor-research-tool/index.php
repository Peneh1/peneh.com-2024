<?php
require 'db.php';
//1 get field options
$sql = 'select DISTINCT field from drt_doctor';
$get_field = $db->query($sql);
//2 get state options
$sql2 = 'select DISTINCT state from drt_doctor';
$get_state = $db->query($sql2);

    
?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title> Free Doctors Research Tool - Powered by the community</title>
    <meta name="description" content="Free Doctors Research Tool">
  <meta name="keywords" content="Free Doctors Research Tool" >
     <link href="style.css" rel="stylesheet">
  
</head>

<body style="background-image: url(../../assets/images/software/national-cancer-institute-KrsoedfRAf4-unsplash.jpg); ">
    
    
     <a href="add-doctor.php" style="background: blue; padding: 10px 15px; float: right;color: white; margin-top: 0px">Add a Doctor You Trust</a>
    <h1 style="color:antiquewhite; padding: 10px;
               background: hsla(239,90%,28%,0.80); text-align: center;width: 70%; margin: 25px auto
              ">A free doctor research tool, Lookup medical doctors info provided by real patients or patient's family members.</h1>
    
        <form style="background: hsla(0,0%,100%,0.90); padding: 10px; border: 1px solid black; border-radius: 7px;width: 50%; margin: auto" method="get" action="">Search for the Best
<select class="dropbtn" name="field" required>
	<option value=""></option>
<?php while ($doctor_f = $get_field ->fetch_assoc()): ?>    
            
<option value="<?php echo $doctor_f['field']; ?>"><?php echo $doctor_f['field']; ?></option>  
                    <?php endwhile; ?>
   </select>
Doctor in 
    <select class="dropbtn" name="state" required>
	<option value=""></option>
            <?php while ($doctor_c = $get_state ->fetch_assoc()): ?>    
            <option value="<?php echo $doctor_c['state']; ?>"><?php echo $doctor_c['state']; ?></option> 
            <?php endwhile; ?>
           </select>
<input class="btn btn-primary" type="submit" name="find_doctor">
    </form>
    <?php 
if (isset($_GET['find_doctor'])){
   $field = $_GET['field'];
    $state = $_GET['state'];
    //3 get search resolts
    $sql3 = "select * from drt_doctor where state = '$state' and field = '$field'";
$get_search_info = $db->query($sql3);
    
    

 while ($doctor = $get_search_info ->fetch_assoc()): 
   echo"<div style='background: white;   box-shadow: 2px 4px 10px rgb(0 0 0 / 0.7);
padding:10px;margin:10px auto; width:90%;'><h3>"  . $doctor['title'] . " " . $doctor['first_name'] . " " . $doctor['last_name'] . "</h3>";
      echo " <p>A " .  $doctor['field'] . " Doctor in " . $doctor['state'] ."</p>";
        echo " <h4>Phone:<a href='tel:" . $doctor['tel'] ."'> " . $doctor['tel'] ."</a></h4>";
           echo    "<h4>Email:<a  href='mailto:" . $doctor['email'] ."'> ". $doctor['email']."</a></h4>";
          echo "  <p>Rated ". $doctor['rate']. "/5</p>";
     
              //4 get user info
            $user_id = $doctor['info_by'];
    
     $sql4= "select * from drt_user where user_id = $user_id";
            $get_user_info = $db->query($sql4); 

            while ($user = $get_user_info ->fetch_assoc()){
           echo "<p>Info provided by <a href=user.php?id=".$user['user_id'].">"  . $user['first_name']. " " . $user['last_name']." </a></p>";
            }; //user while
   echo" </div>";
     endwhile; //doctor 
    if(!mysqli_num_rows($get_search_info)){
   echo "<form>Sorry, we didn't find anything for your search. We are working on getting more info, as well as people to share their experiences.</form>";}
    } //end of the search resolts
    
    ?>
   
</body>
</html>