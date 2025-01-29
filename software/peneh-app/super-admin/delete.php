<?php
include '../inc/init.php';

If($_GET['id']){
    $id = $_GET['id'];
//cant delete admin
    if(super_admin($db, $id)){set_message('Cant Delete an Admin');redirect('index.php');die();}
    
                  if( super_admin($db, $user_id)){
                      //if user=====================================↓
    if($id >10000000){
                                      try{
                                          $db->query('DELETE FROM peneh_app_users WHERE id= ' . $id);
                                          set_message('ser deleted Successfully');
                                          redirect('index.php');
                                      } catch(PDOException $e){
                                          redirect('index.php');
                                          set_message('Error Deleting:<br>' . $e->getMessage());
                                      }
                                                                                                                 }
                       //if Group=====================================↓
    if($id > 1000 && $id < 9999999){
                                      try{
                                          $db->query('DELETE FROM peneh_app_groups WHERE id= ' . $id);
                                          set_message('Group deleted Successfully');
                                          redirect('index.php');
                                      } catch(PDOException $e){
                                          redirect('index.php');
                                          set_message('Error Deleting:<br>' . $e->getMessage());
                                      }
                                                                         }
                        //if Page=====================================↓
    if($id < 1000){
                                      try{
                                          $db->query('DELETE FROM peneh_app_pages WHERE id= ' . $id);
                                          set_message('page deleted Successfully');
                                          redirect('index.php');
                                      } catch(PDOException $e){
                                          redirect('index.php');
                                          set_message('Error Deleting:<br>' . $e->getMessage());
                                      }
    }
                      //end page=================================================↑
                  } else{
                      set_message('Access Denied!');
                      redirect('../index.php');
                  } 
} else{
    redirect('index.php');
}

?>