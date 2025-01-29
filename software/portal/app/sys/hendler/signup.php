<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\sPHPMailer;
use PHPMailer\PHPMailer\SMTP;


if ($_SERVER["REQUEST_METHOD"] == "POST"):

    require '../config/db.php';

    $database = new Database();
    $db = $database->connect();

    include '../Class/Signup.php';



    require_once '../vender/PHPMailer/src/Exception.php';
    require_once '../vender/PHPMailer/src/PHPMailer.php';
    require_once '../vender/PHPMailer/src/SMTP.php';
    require_once '../vender/PHPMailer/src/SMTP.php';



    $fname = $_POST['first_name'];
    $lname = $_POST['last_name'];
    $company = $_POST['company'];
    $subdomain = $_POST['subdomain'];
    $email = $_POST['email'];
    $password1 = $_POST['password1'];
    $password2 = $_POST['password2'];

    $insert = true;
    $error = [];
    if(strlen($fname) <3):
        $error[]= 'First name not completed';
        $insert = false;
    endif;

    if(strlen($lname) <3):
        $error[] = 'Last name not completed';
        $insert = false;
    endif;

    if(strlen($company) <5):
        $error[] = 'Company name not completed';
        $insert = false;
    endif;

    if(strlen($subdomain) <5):
        $error[] = 'Subdomain canot be less then five characters';
        $insert = false;
    endif;

    if(!preg_match('^[A-z]+$^', $subdomain)):
        echo $subdomain;
        $error[] = 'Subdomain can only contain letters';
        $insert = false;
    endif;


    if(Signup::domain_taken($db, $subdomain)):
        $error[] = 'Subdomain Taken';
        $insert = false;
    endif;


    if(Signup::invalid_Email($email)):
        $error[] = 'invalid Email';
        $insert = false;
    endif;

    if ($password1 != $password2):
        $error[] = 'Password dos not match';
        $insert = false;
    endif;


    if ($insert === true):

        $mail = new PHPMailer(true);

        if(
        Signup::create_user($db, $fname,$lname,$company,$subdomain,$email,$password1) &&                                       
                                            
        Signup::send_email($mail, $fname, $email, $subdomain,)
        ):

                echo json_encode(['success' => true, 'message'=>'Your Aplication was Approved, Check your email for instructions']);

        else:

            echo json_encode(['success' => false, 'message'=>'Oh! no!, Something want wrong with your requast']);
            
        endif;
        
    else:

        //is error
        $out = array_values($error);

        echo json_encode(['success' => false, 'message' => $out]);
    
    endif;

else:
    //no post
    echo json_encode(['success' => false, 'message' => 'Requast type not supported']);
endif;





?>