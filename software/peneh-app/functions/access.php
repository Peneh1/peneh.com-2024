<?php
//check if loged in===================================
function logged_in(){
                if (isset($_SESSION['user_id'])){
                        return true;
                } else {
                    //check for cookie
                     If(isset($_COOKIE['username'])){
                                    $_SESSION['user_id'] = $_COOKIE['username'];
                                    return true;
                                } else {
                                                                        return false;

                                }
                }
               
}

//check for user DIRECT access========================================
function verify_user_direct_access($db, $user_id, $page){
    
     try{
        $sql1="SELECT id FROM peneh_app_user_page_link WHERE user_id  = $user_id AND page_id = $page";
        $stmnt=$db->query($sql1);
                    if($stmnt->rowCount() == 1):
                     return true;
                     else: 
                     return false;
                     endif;
    }catch(PDOException $e){
        echo  $e->getMessage();
         return false;
    }
}
//check for user page_group access========================================
function verify_user_page_group_access($db, $user_id, $page){
    
     try{
        $sql1="SELECT peneh_app_user_group_link.group_id, 
        peneh_app_user_group_link.user_id, 
        peneh_app_group_page_link.page_id AS page_id 
        FROM peneh_app_user_group_link 
        JOIN peneh_app_group_page_link ON peneh_app_group_page_link.group_id = peneh_app_user_group_link.group_id WHERE page_id = {$page}  AND user_id = {$user_id}";
        $stmnt=$db->query($sql1);
                    if($stmnt->rowCount()>0):
                     return true;
                     else: 
                     return false;
                     endif;
    }catch(PDOException $e){
        echo  $e->getMessage();
        // return false;
    }
}

//check for admin access========================================
function verify_admin_access($db, $user_id){
     try{
        $sql1="SELECT id FROM peneh_app_users WHERE id  = $user_id AND level = 'admin' ";
        $stmnt = $db->query($sql1);

                    if($stmnt->rowCount() > 0):
                     return true;
                     else: 
                     return false;
                     endif;
    }catch(PDOException $e){
        echo  $e->getMessage();
         return false;
    }
}
//check if this user created the page======================================
function created_by_user($db, $page_id, $user_id){
    try{
        $sql3="SELECT id FROM peneh_app_pages WHERE created_by  = $user_id AND id = $page_id";
        $stmnt=$db->query($sql3);
                    if($stmnt->rowCount() == 1):
                     return true;
                     else: 
                     return false;
                     endif;
    }catch(PDOException $e){
        echo  $e->getMessage();
         return false;
    }
}
//Check if SUPER ADMIN==================================
function super_admin($db, $user_id){
     try{
        $sql1="SELECT id FROM peneh_app_users WHERE id  = $user_id AND level = 'super admin'";
        $stmnt=$db->query($sql1);
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
?>