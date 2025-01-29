<?php
include '../../inc/init.php';

    
    If($_GET['user_id'] && $_GET['group_id']){
    $the_user_id = $_GET['user_id'];
    $group_id = $_GET['group_id'];
   
                                      try{
                                          $db->query('DELETE FROM peneh_app_user_group_link WHERE group_id = ' . $group_id . ' AND user_id =  ' . $the_user_id );
                                          set_message('User removed Successfully');
                                          redirect(ROOT . '/admin/groups/manage_group_users.php?id=' . $group_id);
                                                                              } catch(PDOException $e){
                                          set_message('Error Deleting:<br>' . $e->getMessage());
                                      }
                                                                         
                      
} else{
        redirect(ROOT . '/admin/index.php');
}

?>