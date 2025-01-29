<?php
include '../../inc/init.php';
//need a switch to make this work========================
If($_GET['id']){
    $id = $_GET['id'];
   
                                      try{
                                          $db->query('DELETE FROM peneh_app_groups WHERE id= ' . $id);
                                          set_message('Group deleted Successfully');
                                         redirect(ROOT . '/index.php');
                                      } catch(PDOException $e){
                                          redirect(ROOT . '/index.php');
                                          set_message('Error Deleting:<br>' . $e->getMessage());
                                      }
                                                                         
                      
} else{
                                          redirect('index.php');
}

?>