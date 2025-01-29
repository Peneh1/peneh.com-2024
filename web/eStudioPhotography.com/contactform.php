<?php

    $error = ""; $successMessage = "";

    if ($_POST) {
        
        if (!$_POST["email"]) {
            
            $error .= "Your email address is missing.<br>";
            
        }
        
              
        if (!$_POST["subject"]) {
            
            $error .= "The subject is missing.<br>";
            
        }
      
          if (!$_POST["content"]) {
            
            $error .= "The massage box is empty.<br>";
            
        }
      
        if ($_POST['email'] && filter_var($_POST["email"], FILTER_VALIDATE_EMAIL) === false) {
            
            $error .= "The email address was invalid.<br>";
            
        }
        
        if ($error != "") {
            
            $error = '<div class="alert alert-danger" role="alert"><p>There were an error sending your form, because:</p>' . $error . '</div>';
            
        } else {
            
            $emailTo = "estudiosny@gmail.com";
            
 			$subject = "Powered by Peneh.com -  You got a new massage from your website. Subject: ".$_POST['subject'];    
          
            $content = $_POST['content'];
            
            $headers = "From: ".$_POST['email'];
              
               
            
            if (mail($emailTo, $subject, $content, $headers)) {
                
                $successMessage = '<div class="alert alert-success" role="alert">Your message was sent, we\'ll get back to you ASAP!<br>Thank You!</div>';
                
                
            } else {
                
                $error = '<div class="alert alert-danger" role="alert"><p><strong>Your message couldn\'t be sent - please try again later</div>';
                
                
            }
            
        }
        
        
        
    }

?>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.2/js/bootstrap.min.js" integrity="sha384-vZ2WRJMwsjRMW/8U7i6PWi6AlO1L79snBrmgiDpgIWJ82z8eA5lenwvxbMV1PAh7" crossorigin="anonymous"></script>

<div style="width:500px; margin:auto; padding:10px" id="error"><? echo $error.$successMessage; ?></div>