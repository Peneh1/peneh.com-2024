<?php


// set API url
$url = 'https://www.google.com/recaptcha/api/siteverify';
// Collection object
$data = [
  'secret' => '6LeEnZ0aAAAAABcnYbOou5W1tdgk-wdR2jwkZ--A', //<--- your reCaptcha secret key
  'response' => $_POST['recaptcha']
];
// Initializes a new cURL session
$curl = curl_init($url);
// Set the CURLOPT_RETURNTRANSFER option to true
curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);

curl_setopt($curl,CURLOPT_SSL_VERIFYPEER, false);

// Set the CURLOPT_POST option to true for POST request
curl_setopt($curl, CURLOPT_POST, true);
// Set the request data as JSON using json_encode function
curl_setopt($curl, CURLOPT_POSTFIELDS,  $data);

// Execute cURL request with all previous settings
$response = curl_exec($curl);
// Close cURL session
curl_close($curl);

$response = json_decode($response);



/*testing ↓###################################################################
var_dump($response);echo '<table>';    foreach ($_POST as $key => $value) {
        echo "<tr>";
        echo "<td>";
        echo $key;
        echo "</td>";
        echo "<td>";
        echo $value;
        echo "</td>";
        echo "</tr>";
    }
echo '</table>';
#end testing ↑###########################################################*/

if ( ($_POST['first_name']!='') && ($_POST['email']!='') && ($_POST['recaptcha'] !='')):

    $fname = $_POST['first_name'];
    $lname = $_POST['last_name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $fsubject = $_POST['subject'];
    $fmessage = $_POST['message'];
    $rechapta = $_POST['recaptcha'];
    $from = "website@peneh.com";
    $to = "info@peneh.com";		
    $headers = "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
    $headers = "From: ".$from."\r\n" .
            "Reply-To: ".$email."\r\n";

    $subject = "$fsubject";
    $message = "Contact Request Form Details:
    First Name: $fname
    Last Name: $lname 
    Phone: " . $phone ."
    email: " . $email . "
    MESSAGE: $fmessage";

else:
  echo 'Missing Data';
  //exit();
endif;
//invalid email
if (!checkEmail($email)):
   echo "<div style='border:2px solid red; background-color:white;border-radius:5px;text-align: center;font-family: sans-serif;'>
 <span style='background-color: red; border-radius:5px 5px 0px 0px; text-align: center; margin: 0px;  color: #F7F5F5;font-size: 30px;width:100%; padding: 15px; display: inline-block;
'>Sorry</span> 
 <br><br><br><br><span style='text-transform: uppercase;font-size:20px; padding-top:40px'>$fname!</span><br>
 <span style='color: #231E1E;font-size:20px;line-height: 30px;padding: 20px;margin-top20px;'>Invalid Email Entered<br> Please reload the page and try again</span><br><br><br>
 </div>";

    //if url in form message, throw error

elseif (url_in($fmessage)):
    echo "<div style='border:2px solid red; background-color:white;border-radius:5px;text-align: center;font-family: sans-serif;'>
 <span style='background-color: red; border-radius:5px 5px 0px 0px; text-align: center; margin: 0px;  color: #F7F5F5;font-size: 30px;width:100%; padding: 15px; display: inline-block;
'>Sorry</span> 
 <br><br><br><br><span style='text-transform: uppercase;font-size:20px; padding-top:40px'>$fname!</span><br>
 <span style='color: #231E1E;font-size:20px;line-height: 30px;padding: 20px;margin-top20px;'>Ileagal URL in message<br> Please reload the page and try again</span><br><br><br>
 </div>";

elseif (!$response->success):

  // failed
  echo "<div style='border:2px solid red; background-color:white;border-radius:5px;text-align: center;font-family: sans-serif;'>
<span style='background-color: red; border-radius:5px 5px 0px 0px; text-align: center; margin: 0px;  color: #F7F5F5;font-size: 30px;width:100%; padding: 15px; display: inline-block;
'>Sorry</span> 
<br><br><br><br><span style='text-transform: uppercase;font-size:20px; padding-top:40px'>$fname!</span><br>
<span style='color: #231E1E;font-size:20px;line-height: 30px;padding: 20px;margin-top20px;'>
You look like a robot</span><br><br><br>
</div>";

else:

$sent = mail($to,$subject,$message,$headers);
	if($sent){
  echo "<div style='border:2px solid green; background-color: white; border-radius: 5px; text-align: center;font-family: sans-serif;'>
<span style='background-color: green; border-radius:5px 5px 0px 0px; text-align: center; margin: 0px;  color: #F7F5F5;font-size: 30px;width:100%; padding: 15px;display: inline-block;
'>Thank You</span> <br><br><br><br><span style='text-transform: uppercase;font-size:20px; padding-top:40px'>$fname!</span><br>
 <span style='color: #231E1E;font-size:20px;line-height: 30px;padding: 20px;margin-top20px;'> Your massage was deliverd sucsessfully!<br>will get back to you ASAP!</span><br><br><br>
 </div>";
	} else {
		echo "<div style='border:2px solid red; background-color:white;border-radius:5px;text-align: center;font-family: sans-serif;'>
 <span style='background-color: red; border-radius:5px 5px 0px 0px; text-align: center; margin: 0px;  color: #F7F5F5;font-size: 30px;width:100%; padding: 15px; display: inline-block;
'>Sorry</span> 
 <br><br><br><br><span style='text-transform: uppercase;font-size:20px; padding-top:40px'>$fname!</span><br>
 <span style='color: #231E1E;font-size:20px;line-height: 30px;padding: 20px;margin-top20px;'>Your form submission failed <br> Please try again later.</span><br><br><br>
 </div>";
	}

endif;

function checkEmail($email)
{
    if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
          return false;
    }
  
    $host = end(explode("@", $email));
   
    if(!checkdnsrr($host, "MX") && !checkdnsrr($host, "A")){
      return false;
    }

    return true;
}

function url_in($fmessage) {
if (preg_match('/[-a-zA-Z0-9@:%._\+~#=]{1,256}\.[a-zA-Z0-9()]{1,6}\b([-a-zA-Z0-9()@:%_\+.~#?&\/\/=]*)?/', $fmessage)){

    return true;
}
    return false;
}