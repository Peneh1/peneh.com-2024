<?php
session_start();


 ob_start();

$from_email = 'support@peneh.com';
$reply_to_email = 'support@peneh.com';

if($_SERVER['HTTP_HOST'] == 'localhost'){
define('INCLUDE_ROOT', $_SERVER['DOCUMENT_ROOT'] . '/software/peneh-app');
define('ROOT',  'http://' . $_SERVER['HTTP_HOST'] . '/software/peneh-app');

} else {
define('INCLUDE_ROOT', $_SERVER['DOCUMENT_ROOT']);
define('ROOT',  'https://' . $_SERVER['HTTP_HOST']);}

 
$user_id = '';
if(isset($_SESSION['user_id'])):
$user_id = $_SESSION['user_id'];
endif;

//includes
include INCLUDE_ROOT . '/inc/config.php';

 include INCLUDE_ROOT . '/functions/peneh.php'; 



?>