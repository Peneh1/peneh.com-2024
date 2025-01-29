<?php
class Signup{ 
  
//===================================================================================================
 static  function domain_taken($db, $sub){
        try{
            $sql = 'SELECT id FROM pp_users WHERE subdomain = :sub LIMIT 1';
            $stmnt = $db->prepare($sql);
            $stmnt->execute([':sub' => $sub]);
            if($stmnt->rowCount()>0):
                return TRUE;
            else: 
                return FALSE;
            endif;
        }catch(PDOException $e){


            echo json_encode(['success' => false, 'message'=>'Oh! no!, Something want wrong with your requast',
        'sql_error' => $e->getMessage()]);
        }
    }
//====================================================================================================
static function create_user($db,$fname,$lname,$company,$subdomain,$email,$password){
    try{
          $sql = 'insert into pp_users (first_name, last_name, company, subdomain, email, password) VALUE (:fname, :lname, :company, :subdomain, :email, :password)';
            $stmnt=$db->prepare($sql);
            $stmnt->execute([':fname' => $fname, ':lname' => $lname, ':company' => $company, 
                                ':subdomain' => $subdomain, ':email' => $email, 
                        ':password' => password_hash($password, PASSWORD_BCRYPT)]);
            return true;

                        
    }catch(PDOException $e){
            return false;
            echo json_encode(['success' => false, 'message'=>'Oh! no!, Something want wrong with your requast',
        'sql_error' => $e->getMessage()]);
}
}
//====================================================================================================
   static  function invalid_Email($email)
    {
        if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
              return true;
        }
      
        $host = end(explode("@", $email));
       
        if(!checkdnsrr($host, "MX") && !checkdnsrr($host, "A")){
          return true;

        }
    
        return false;
    }
    
//========================================================================================================
    
    static function send_email($mail, $fname, $email, $subdomain){
        //Create an instance; passing `true` enables exceptions


try {
    //Server settings
    $mail->SMTPDebug = \PHPMailer\PHPMailer\SMTP::DEBUG_SERVER;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.portalpix.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'support@portalpix.com';                     //SMTP username
    $mail->Password   = '^Z6v5n0b5';                               //SMTP password
    $mail->SMTPSecure = \PHPMailer\PHPMailer\sPHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
    $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom('support@portalpix.com', 'Mailer');
    $mail->addAddress($email, $fname);     //Add a recipient
                                          //Name is optional
    $mail->addReplyTo('support@portalpix.com', 'Information');
    //$mail->addCC('cc@example.com');
    //$mail->addBCC('bcc@example.com');

    //Attachments
    //$mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
    //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'Confirm your email';
    $mail->Body    = 'Hi' . $fname . ',<br> We are so excited, Please confirm your email by 
    clicking here <a href="'. $confirm_url .'">Confirm my email</a>';
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();
    return TRUE;
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
    }
    
}