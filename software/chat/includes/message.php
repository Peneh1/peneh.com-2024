<?php
include 'config.php';
switch( $_REQUEST['action']){
        case  'sendMessage':
    $message = $_GET['message'];
    $user = $_SESSION['username'];
                    try{
                        $stmnt = $db->prepare("insert into peneh_chat_messages SET message = :message, user = :user");
                    $stmnt->execute ([':message'=>$message, ':user'=>$user]);
                    }catch(PDOException $e){
                        echo 'Error:' . $e->getMessage();
                    }
    if($stmnt){
        echo 1;
        exit();
        break;
}


case  'getMessage':
 
                        $stmnt = $db->prepare("SELECT * FROM peneh_chat_messages");
                        $run = $stmnt->execute();
                        $rs = $stmnt->fetchAll(PDO::FETCH_OBJ);
                        $chat = ' ';
                        foreach ($rs as $message) {
                            //current user to the right
                            $style = '';
                            $style2 = '';
                            if ($message->user == $_SESSION['username']){
                                $style = 'float:right;';
                                $style2= 'border-top: 3px solid blue;';    }
                            
                        $chat .=  '<div class="singal-message" style=" ' . $style . ' "><p style=" ' . $style2 . ' "><strong>' . $message->user . ':</strong><span style="float:right; font-size:10px">' . date('F j, Y, h:i a', strtotime($message->date)) . ' </span><br> ' . $message->message . '<br> </p><div style="clear:both;"></div>' ;
                        }
                            echo $chat;

                  
        break;
}


?>
