<?php


//redirect function ================================
function redirect($location){
    header("location:{$location}");
}
//genarate token================================
function generate_token(){
    return md5(microtime().mt_rand());
}
//see if data dosent exsistes from datebase===========================
function count_field($db, $table, $field, $val){
    try{
        $sql="SELECT {$field} FROM {$table} WHERE {$field} = :value";
        $stmnt=$db->prepare($sql);
        $stmnt->execute([':value' => $val]);
        return $stmnt->rowCount();
        }catch(PDOException $e){
        return $e->getMessage();
    }
}
//get field data  from datebase===========================
function return_field_data($db, $table, $field, $val){
    try{
        $sql="SELECT * FROM {$table} WHERE {$field} = :value";
        $stmnt=$db->prepare($sql);
        $stmnt->execute([':value' => $val]);
        return $stmnt->fetch();
    }catch(PDOException $e){
        return $e->getMessage();
    }
}
//send email====================================

function send_email($to, $subject, $body, $from, $reply){
    $headers = "From: {$from}" . "\r\n" . "reply-To: {$reply}" . "\r\n" . "Content-type: text/html; charset: utf8\r\n" . "x-mailer: PHP/" .phpversion();
    if ($_SERVER['SERVER_NAME'] != "localhost"){
        mail($to, $subject, $body, $headers);
    } else{
        echo "<hr><p>To:{$to}</p><p>Subject: {$subject}</p><p>{$body}</p><p>{$headers} </p><hr>";
    }
}
//check if match with database==========================
function get_validation_code($user, $db){
     try{
        $sql1="SELECT validationcode FROM peneh_app_users WHERE username = :username";
        $stmnt=$db->prepare($sql1);
        $stmnt->execute([':username' => $user]);
         $row = $stmnt->fetch();
        return $row['validationcode'];
    }catch(PDOException $e){
        return $e->getMessage();
    }
}

//check if recourd exsist================================================
function row_exists($db, $table, $column1, $val1, $column2, $val2){
     try{
        $sql3="SELECT id FROM $table WHERE $column1  = $val1 AND $column2 = $val2";
        $stmnt=$db->query($sql3);
                    if($stmnt->rowCount()>0):
                     return true;
                     else: 
                     return false;
                     endif;
    }catch(PDOException $e){
        echo  $e->getMessage();
         return false;
    }
}
//FIX XSS INJECTION remove onwnted brackets and spacial charectors

function fix_xss($array){
    foreach ($array as $key=>$value){
        $array[$key] = htmlentities($value);
    }
    return($array);
}
?>