<?php require 'inc/init.php'; ?>

<?php
if($_SERVER['REQUEST_METHOD']=='POST'){
    $username = $_POST['username'];
    $password = $_POST['password'];
            //check if stay looged in is checked
            if(isset($_POST['remember'])){
                    $remember = 'on';

            } else {
                    $remember = 'off';
            }

                //check if user exsist
                if(count_field($db, 'peneh_app_users', 'username', $username) == 0){ 
                    set_message("Invalid username entered: $username");

                      } else {
                        set_message("correct username entered: $username", 'success');
                    $user_data = return_field_data($db, 'peneh_app_users', 'username', $username);
                                    //check if user is active
                                    if($user_data['active'] == 1){
                                                                //verify encrypted password
                                                                if(password_verify($password, $user_data['password'])){
                                                                    $_SESSION['username'] = $username;
                                                                    $_SESSION['user_id'] = $user_data['id'];
                                                                    $_SESSION['user_first_name'] = $user_data['first_name'];
                                                                    $_SESSION['user_last_name'] = $user_data['last_name'];
                                                                    if($remember == 'on'){
                                                                        setcookie('username', $username, time()+3600, '/' ,null, false, true);
                                                                    }
                                                                   set_message('login success!', 'success');
                                                                    redirect('index.php');
                                                                    $sql = "UPDATE peneh_app_users SET last_login = CURRENT_TIMESTAMP WHERE id = {$user_data['id']}";
                                                                    $db->query($sql);

                                                                } else{
                                                                    set_message('invalid password');
                                                                }
                                    } else{
                                        set_message('User not activ - User didnt confirm his email yet');
                                    }

              
                }
} else {
    $username = '';
    $password = '';
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
			    <div class="col-md-6 col-md-offset-3">
				    <div class="panel panel-login">
					    <div class="panel-body">
						    <div class="row">
							    <div class="col-lg-12">
								    <form id="login-form"  method="post" role="form" style="display: block;">
									    <div class="form-group">
										    <input type="text" name="username" id="username" tabindex="1" class="form-control" placeholder="Username" required value="<?php echo $username; ?>">
									    </div>
									    <div class="form-group">
										    <input type="password" name="password" id="login-
										password" tabindex="2" class="form-control" placeholder="Password" required value="<?php echo $password; ?>">
                                        </div>
                                        <div class="form-group text-center">
                                            <input type="checkbox" tabindex="3" class="" name="remember" id="remember">
                                            <label for="remember">Stay logged in</label>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-sm-6 col-sm-offset-3">
                                                    <input type="submit" name="login-submit" id="login-submit" tabindex="4" class="form-control btn btn-custom" value="Log In">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-lg-12">
                                                    <div class="text-center">
                                                        <a href="user/reset_a.php" tabindex="5" class="forgot-password">Forgot Password?</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                    <hr>
                                    <h5 class="text-center">New to Peneh? <a class="forgot-password" href="register.php">Register now!</a></h5>
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