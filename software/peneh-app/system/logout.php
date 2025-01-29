<?php
include '../inc/init.php';

unset($_SESSION['user_id']);

if(isset($_COOKIE['username'])){
    setcookie('username', 'delete', time()-3600, '/', null, false, true);

    
}
redirect('../login.php');


?>