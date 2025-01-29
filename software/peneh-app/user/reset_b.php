<?php 

include '../inc/init.php';
?>
<?php
if($_GET['user']){
    $username = $_GET['user'];
    $vcode = $_GET['confirm_code'];
    $password1 = '';
    $password2 = '';
                    if(count_field($db, 'peneh_app_users', 'username', $username) == 0){ 
                        set_message('invalid User');
                        redirect('index.php');
                    } else {
                        
                        $user_value = return_field_data($db, 'peneh_app_users', 'username', $username);
                                            if($vcode != $user_value['validationcode']){
                                                 set_message('invalid code');
                                               redirect('index.php');
                                            } 
                   
                    }
} else {
    echo 'bad request';
    die();
}
//hendle new password===========================================
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $password1 = $_POST['password1'];
    $password2 = $_POST['password2'];
    if($password1 != $password2){
        set_message("Passwords dosn't match");
    } else {
        try{
            
                  $stmnt =  $db->prepare("update peneh_app_users SET password = :password where username = :username");
                    
                    $stmnt->execute([':password'=> password_hash($password1, PASSWORD_BCRYPT), ':username'=> $username]);
                    set_message('Success, Please log in');
                    redirect('login.php');
        } catch(PDOException $e){
            echo $e;
        }
    }
}

?>
<!DOCTYPE html>
<html lang="en">
    <?php include "includes/header.php" ?>
    <body>
        <?php include "includes/nav.php" ?>
        <div class="container">
            <?php  
        display_message();
            ?>
    	    <div class="row">
                <h2 class="text-center">Please enter your new password</h2>
			    <div class="col-md-6 col-md-offset-3">
				    <div class="panel panel-login">
					    <div class="panel-body">
						    <div class="row">
							    <div class="col-lg-12">
								    <form id="login-form"  method="post" role="form" style="display: block;">
									    <div class="form-group">
										    <input type="text" name="password1" id="password" tabindex="1" class="form-control" placeholder="New Password" required value="<?php echo $password1; ?>">
									    </div>
									    <div class="form-group">
										    <input type="password2" name="password2" id="login-
										password" tabindex="2" class="form-control" placeholder="Retype Password" required value="<?php echo $password2; ?>">
                                        </div>
                                     <div class="form-group">
                                            <div class="row">
                                                <div class="col-sm-6 col-sm-offset-3">
                                                    <input type="submit" name="login-submit" id="login-submit" tabindex="4" class="form-control btn btn-custom" value="Save">
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
        <?php include "includes/footer.php" ?>
    </body>
</html>