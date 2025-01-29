<?php 
include '../inc/init.php';
?>
<?php
if($_SERVER['REQUEST_METHOD']  ==  'POST'){
    $username = $_POST['username'];
                    if(count_field($db, 'peneh_app_users', 'username', $username) == 0){
                                                set_message("Username: <b>{$username}</b> was not found");

                    } else{
                       $user_date =   return_field_data($db, 'peneh_app_users', 'username', $username);
                        $body = "<p>To reset your password please click on the link below</p><p><a href='https://peneh.com/software/peneh-app/reset_b.php?user={$username}&confirm_code={$user_date['validationcode']}'>Change Password</a></p>";
                        send_email($user_date['email'], 'Change password request', $body, $from_email, $reply_to_email);
                                                set_message("Link was sent to your email on file", 'success');

                    
                    }
} else {
    $username = '';
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
                <h2 class="text-center"> Password Reset</h2>
			    <div class="col-md-6 col-md-offset-3">
				    <div class="panel panel-login">
					    <div class="panel-body">
						    <div class="row">
							    <div class="col-lg-12">
								    <form id="login-form"  method="post" role="form" style="display: block;">
									    <div class="form-group">
										    <input type="text" name="username" id="username" tabindex="1" class="form-control" placeholder="Username" required value="<?php echo $username; ?>">
									    </div>
									   
                                        </div>
                                    <div class="form-group">
                                            <div class="row">
                                                <div class="col-sm-6 col-sm-offset-3">
                                                    <input type="submit" name="reset-submit" id="reset-submit" tabindex="4" class="form-control btn btn-custom" value="Reset Password">
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