<?php


//disply=================================================
function display_message(){
      if(isset($_SESSION['message']))      {
        echo $_SESSION['message'];
       unset($_SESSION['message']);
             }
}

//get message info and level=================================
function set_message($message, $level='danger'){
   
         $_SESSION['message']= '<p class="bg-' . $level . ' text-center">' . $message . '</p>';
    
  
}

?>