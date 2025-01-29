<?php
if ($_SERVER['REQUEST_METHOD']=="POST"){
    $first_name =$_POST['firstname'];
    $last_name =$_POST['lastname'];
    $username =$_POST['username'];
    $email =$_POST['email'];
    $email_conf =$_POST['confirm_email'];
    $password =$_POST['password'];
    $password_conf =$_POST['confirm_password'];
    $comments =$_POST['comments'];
    $lavel = $_POST['level'];
    //↑end form value↑
    
    //↓start valdation of form↓
    if (strlen($last_name) <3){
        $error[] = "Last name must to be at least 3 charachters long";
    }
    
      if (strlen($username) <5){
        $error[] = "Username must to be at least 5 charachters long";
    }
    
    if (strlen($password) <8){
        $error[] = "Password must to be at least 8 charachters long";
    }
    
    if ($password != $password_conf){
        $error[] = "Password dosn't match";
    }
    
    if ($email != $email_conf){
        $error[] = "Email address dosn't match";
    }
        //check for if username  exists

      if(count_field($db, 'peneh_app_users', 'username', $username) == 1){
            $error[] = "Username '{$username}' is taken";
      }
        //check for if email exists

    if(count_field($db, 'peneh_app_users', 'email', $email) == 1){
           $error[] = "The Email '{$email}' already existes";
      }
 
    //↑end form valdation↑
    
    //↓start sending data of form if no errors↓
  
    
if (!isset($error)){
    $vcode = generate_token();
    try{
       
       $sql="INSERT INTO peneh_app_users(first_name, last_name, username, email, password, comments, validationcode, active, joined, last_login, level       ) VALUES (        :firstname,        :lastname,        :username,        :email,       :password,        :comments,        :vcode,        '0',        current_date,        current_date, :level       )";
       $stmnt = $db->prepare($sql);
       $user_data = [
            ':firstname'=>$first_name,
            ':lastname'=>$last_name,
           ':username'=>$username, 
           ':email'=>$email,
           ':password'=>password_hash($password, PASSWORD_BCRYPT),
           ':comments'=>$comments,
           ':vcode'=>$vcode,
            ':level'=>$lavel
       ];
       $stmnt->execute($user_data);
        $body = "<p>To activate your account you will need to confirm your email address,  So click on the link below</p><p><a href='https://app.peneh.com/system/activate.php?user={$username}&confirm_code={$vcode}'>Confirm Email</a></p>";
        send_email($email, 'Please confirm your email address', $body, $from_email, $reply_to_email);
        //redirecting user to home page with message 
        set_message('User Succesfully Registered, please check your email for instructions', 'info');
       redirect('index.php');
   }catch(PDOException $e){
        echo 'Error: '. $e->getMessage();
                          }
}else{
    
}
   
} else{
     $first_name ='';
    $last_name ='';
    $username ='';
    $email ='';
    $email_conf ='';
    $password ='';
    $password_conf ='';
    $comments ='';
    
}
    
?>


<!DOCTYPE html>
<html lang="en">
    <?php include "includes/header.php" ?>
    <body>
        <?php include "includes/nav.php" ?>

        <div class="container">
            <h4 class="text-center">Create your FREE account</h4>
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
                                            <select name="level" id="admin"  class="form-control" required>
                                                <option value="">Pleas choose</option>
                                                <option value="user">Free Account </option>
                                                <option value="admin">$10/Month</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <input type="text" name="username" id="username" tabindex="3" class="form-control" placeholder="Username" value="<?php echo $username;?>" required >
                                        </div>
                                        <div class="form-group">
                                            <input type="email" name="email" id="register_email" tabindex="4" class="form-control" placeholder="Email Address" value="<?php echo $email;?>" required >
                                        </div>
                                        <div class="form-group">
                                            <input type="email" name="confirm_email" id="confirm-email" tabindex="4" class="form-control" placeholder="Confirm Email Address" value="<?php echo $email_conf;?>" required >
                                        </div>
                                        <div class="form-group">
                                            <input type="password" name="password" id="password" tabindex="5" class="form-control" placeholder="Password" value="<?php echo $password;?>" required>
                                        </div>
                                        <div class="form-group">
                                            <input type="password" name="confirm_password" id="confirm-password" tabindex="6" class="form-control" placeholder="Confirm Password" value="<?php echo $password;?>" required>
                                        </div>
                                        <div class="form-group">
                                            <textarea name="comments" id="comments" tabindex="7" class="form-control" placeholder="Comments" ><?php echo $comments;?></textarea>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-sm-6 col-sm-offset-3">
                                                    <input type="submit" name="register-submit" id="register-submit" tabindex="4" class="form-control btn btn-custom" value="Register Now">
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                    <hr>
                                    <h5 class="text-center">Already have an account? <a class="forgot-password" href="login.php">Login now!</a></h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php include "includes/footer.php" ?>
    </body>
</html>