<?php
session_start();
//every user is getting a uneiq id.
//when loging in, the user will be prompt to clock in.
//if user is clocked in, the user will be prompt to clock out.
//when user clockes in the time stamp will be saved into db 
//disply how many hours every user was in by day or month by user
?>
<?php
//check if user is loged in
if(isset($_SESSION['redirect'])){
        require_once 'includes/' . $_SESSION['redirect'];
}else{
        require_once 'includes/login.php';
    exit;
}
    ?>