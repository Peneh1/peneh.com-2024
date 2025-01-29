<?php
//add a doctor to the database


require 'db.php';
    if($_POST['submit']){
    //doctor var
   $title = $_POST['title']; 
     $d_first_name = $_POST['doctor_fname']; 
     $d_last_name = $_POST['doctor_lname']; 
     $field = $_POST['field']; 
     $state = $_POST['state']; 
     $d_tel = $_POST['doctor_tel']; 
     $d_email = $_POST['doctor_email']; 
        $rate = $_POST['rate'];
        $review = $_POST['review'];

         //user var
      $user_id = rand(10000, 99999);  
    $u_first_name = $_POST['user_fname']; 
     $u_last_name = $_POST['user_lname']; 
     $u_tel = $_POST['user_tel']; 
     $u_email = $_POST['user_email']; 
  
    //add info to doctor table
    $sql = "insert into `drt_doctor` (
    `id`, `title`, `first_name`, `last_name`, `field`, `state`, `tel`, `email`, `rate`, `review`, `info_by`) 
 VALUES (
 NULL, '$title', '$d_first_name', '$d_last_name', '$field', '$state', '$d_tel', '$d_email', '$rate','$review', '$user_id') ";
    
    //add info to user table
        $sql2 = "insert into `drt_user` (
        `id`, `user_id`, `first_name`, `last_name`, `tel`, `email`)
        VALUES (
        NULL, '$user_id', '$u_first_name', '$u_last_name', '$u_tel', '$u_email')";
        
      $doctor_info=  $db->query($sql);
      $user_info =  $db->query($sql2);
    if($doctor_info && $user_info){
        echo '     <link href="style.css" rel="stylesheet">
        <form>Successfully saved! all info will be reviewed by a Houman.<br>
        Thank you for helping the community find the best doctors.<br> Remember! You Save Lifes!<br><a href="index.php">Go to Home</a></form>';
            
            
    } 
}








?>