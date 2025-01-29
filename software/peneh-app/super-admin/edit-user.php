<?php require '../inc/init.php'; 

?>
<?php
//if get id in url
If($_GET['id']){
    $user_id = $_GET['id'];
    //id dosnt exsist
    if(count_field($db, 'peneh_app_users', 'id', $user_id) == 0){redirect('index.php');}
    
    $user_info = return_field_data($db, 'peneh_app_users', 'id', $user_id);
    $first_name = $user_info['first_name'];
    $last_name = $user_info['last_name'];
    $email = $user_info['email'];
    $lavel = $user_info['level'];
    $comments = $user_info['comments'];
} else {
    redirec('index.php');
}

?>
<?php
if ($_SERVER['REQUEST_METHOD']=="POST"){
    $first_name =$_POST['firstname'];
    $last_name =$_POST['lastname'];
    $email =$_POST['email'];
    $comments =$_POST['comments'];
    $lavel = $_POST['level'];
    //↑end form value↑
    
   
    //↓start sending data of form if no errors↓
  
    
if (!isset($error)){
    $vcode = generate_token();
    try{
       
       $sql="UPDATE peneh_app_users SET first_name = :firstname, last_name = :lastname, email = :email,  comments = :comments, level = :level WHERE id = {$user_id}";
       $stmnt = $db->prepare($sql);
       $user_data = [
            ':firstname'=>$first_name,
            ':lastname'=>$last_name,
           ':email'=>$email,
           ':comments'=>$comments,
           ':level'=>$lavel 
           ];
       $stmnt->execute($user_data);
       
        //redirecting user to home page with message 
        set_message('User Succesfully updated');
       redirect('index.php');
   }catch(PDOException $e){
        echo 'Error: '. $e->getMessage();
                          }
}else{
    
}
   
} else{
     
    
}
    
?>


<!DOCTYPE html>
<html lang="en">
    <?php include "../includes/header.php" ?>
    <body>
        <?php include "../includes/nav.php" ?>

        <div class="container">
            <h4 class="text-center">Edit User </h4>
            <div class="row">
                <div class="col-lg-6 col-lg-offset-3">
<?php 
                    if(isset($error)){
                        foreach($error as $msg){
    
                            echo '<p class="bg-danger text-center">' . $msg . '</p>';

                        } 
                    }
                    ?>

                </div>
            </div>
            <div class="row">
                <div class="col-md-6 col-md-offset-3">
                    <div class="panel panel-login">
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-12">
                                    <form id="register-form" method="post" role="form" >
                                        <div class="form-group">
                                            <input type="text" name="firstname" id="firstname" tabindex="1" class="form-control" placeholder="First Name" value="<?php echo $first_name;?>" required >
                                        </div>
                                        <div class="form-group">
                                            <input type="text" name="lastname" id="lastname" tabindex="2" class="form-control" placeholder="Last Name" value="<?php echo $last_name;?>" required >
                                        </div>
                                        <div class="form-group">
                                            <input name="level"  class="form-control" value="<?php echo $lavel;?>">
                                                
                                        </div>
                                        <div class="form-group">
                                            <input type="email" name="email" id="register_email" tabindex="4" class="form-control" placeholder="Email Address" value="<?php echo $email;?>" required >
                                        </div>
                                        
                                        <div class="form-group">
                                            <textarea name="comments" id="comments" tabindex="7" class="form-control" placeholder="Comments" ><?php echo $comments;?></textarea>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-sm-6 col-sm-offset-3">
                                                    <input type="submit" name="register-submit" id="register-submit" tabindex="4" class="form-control btn btn-custom" value="Update User">
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php include "../includes/footer.php" ?>
    </body>
</html>