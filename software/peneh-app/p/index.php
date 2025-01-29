<?php

include '../inc/init.php';


if(!$_SESSION['username']):
    set_message('Please log in to view this page');
    redirect('../login.php');
endif;
//assign user to user id var
   $user_id = $_SESSION['user_id'];

//get data from url
                        $url_type = $_GET['type'];
                        $url_id = $_GET['id'];
                        $url_name = $_GET['name'];
//make sure have promission
                     include 'includes/manage-access.php';

//load type template
$load = include  'includes/' . $url_type . '.php';
If(!$load){
    set_message('404 - Page dosnt exsist');
    redirect('../index.php');
}

                     