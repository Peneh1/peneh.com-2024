<?php
require_once '../inc/init.php';
$q = $_GET['q'];

 try{
        $sql="SELECT username FROM peneh_app_users WHERE username LIKE '{$q}%'";
        $stmnt=$db->prepare($sql);
        $stmnt->execute();
        $stmnt->fetch();
          }catch(PDOException $e){
        echo $e->getMessage();
    }
foreach( $stmnt as $users){
 echo "<option value='{$users['id']}'>User: {$users['username']}</option>";
}

?>