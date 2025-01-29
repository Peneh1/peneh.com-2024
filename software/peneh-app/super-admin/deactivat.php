<?php
include '../inc/init.php';

If($_GET['id']){
    $id = $_GET['id'];
  if(super_admin($db, $user_id)){
      //if user active
    $stutas =  return_field_data($db, 'peneh_app_users', 'id', $id);
      if($stutas['active'] == 0){$change = 1;}else{$change = 0;}
      
      try{
          $db->query('UPDATE peneh_app_users SET active = ' . $change .' WHERE id = ' . $id);
          set_message('User Updated Successfully');
          redirect('index.php');
      } catch(PDOException $e){
          redirect('index.php');
          set_message('Error Deactivating:<br>' . $e);
      }
      
  } else{
      set_message('Access Denied!');
      redirect('../account.php');
  } 
} else{
    redirect('index.php');
}

?>