<?php
include '../system/init.php';

if(isset($_GET['user']) ){
    $user = $_GET['user'];
            if(isset($_GET['confirm_code'])){
                  $code = $_GET['confirm_code'];
                  $db_code = get_validation_code($user, $db);
                        if($db_code == $code){
                                            try{
                                                $stmnt=$db->prepare('UPDATE users SET active = 1 WHERE username = :username');
                                                $stmnt ->execute([':username'=>$user]);
                                                 set_message('Suucsesfully activated! You can now <a href="login.php">log in</a> to your account', 'success');
                                                redirect('../index.php');
                                            } catch(PDOException $e){
                                                        echo 'Error:' . $e;
                                            }
                               
                        } else{
                               set_message( 'Invalid code used with activation request');
                                redirect('../login.php');
                        }
            } else{
                     set_message('No code included with activation request');
                    redirect('../index.php');
            }
   
} else{
            set_message('No user included with activation request');
            redirect('../index.php');
}

?>