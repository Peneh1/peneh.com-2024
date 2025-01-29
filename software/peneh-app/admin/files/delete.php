<?php
include '../../inc/init.php';

If($_GET['id']){
    $id = $_GET['id'];
//cant delete admin
    if(verify_admin_access($db, $id)){set_message('Cant Delete an Admin');redirect('index.php');die();}
    
                  if( verify_admin_access($db, $user_id)){
                  
                                      try{
                                          $db->query('DELETE FROM peneh_app_pages WHERE id= ' . $id);
                                          set_message('page deleted Successfully');
                                          redirect('index.php');
                                      } catch(PDOException $e){
                                          redirect('../../index.php');
                                          set_message('Error Deleting:<br>' . $e->getMessage());
                                      }
    
                      //end page=================================================↑
                  } else{
                      set_message('Access Denied!');
                      redirect('../account.php');
                  } 
} else{
    redirect('../index.php');
}

?>