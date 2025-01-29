<?php
include '../inc/init.php';

if(!$_SESSION['user_id']):

            set_message('Please log in to view this page');
            redirect('../index.php');
endif;
//check for privalig to page
$user_id = $_SESSION['user_id'];
if( !super_admin($db, $_SESSION['user_id'])):

        set_message('You dont have permission to view this page');
        redirect('../index.php');

   
 endif; 
?>
<?php
if(isset($_GET['id'])){
    if( count_field($db, 'peneh_app_groups', 'id', $_GET['id']) ==  0){
        redirect('index.php');
    } else {
            $group_id = $_GET['id'];
            $group =  return_field_data($db, 'peneh_app_groups', 'id', $group_id);

    }
    
} else {
    redirect('index.php');
}
//post data
if ($_SERVER['REQUEST_METHOD'] == 'POST'){

    $user_id = $_POST['user_id'];
  $user =  return_field_data($db, 'peneh_app_users', 'id', $user_id);
    
                        if(row_exists($db, 'peneh_app_user_group_link', 'group_id', $group_id, 'user_id', $user_id)){
                        set_message('Connection Already Exsist!');
                        }   else {
                                                    try{
                                                        $stmnt = $db->prepare('INSERT INTO `peneh_app_user_group_link` (group_id, user_id) VALUES (:group_id, :user_id)');
                                                         $stmnt ->execute([':group_id' => $group_id, ':user_id'=> $user_id]); 
                                                        set_message("User <b>{$user['username']}</b>  added to group <b>{$group['name']}</b>", 'success');
                                                    } catch(PDOException $e){echo $e->getMessage();}
                        }
    }

?>
<!DOCTYPE html>
<html lang="en">
    <?php include "../includes/header.php" ?>
    <body>
        <?php include "../includes/nav.php" ?>

        <div class="container">
            <?php display_message()?>
            <div class="row">
                <div class="col-lg-10 col-lg-offset-1">
                     <?php 
    try{
                    $result =  $db->query('select user_id from peneh_app_user_group_link WHERE group_id = ' . $group_id);

                    if ($result->rowCount()>0){

                         echo '<h4 class="text-center">User already in group: <b>' . $group['name'] . '</b></h4>
                         <table class="table"><tr><th>User Id</th>
                                            <th>UserName</th>
                                            <th>Name</th>
                                        </tr>';

                        foreach ($result as $row){
                            $user_info = return_field_data($db, 'peneh_app_users', 'id', $row['user_id']);
                          echo  "<tr><td>{$row["user_id"]}</td>
                                        <td>{$user_info["username"]}</td>
                                        <td>{$user_info["first_name"]} {$user_info["last_name"]}</td>
                                     </tr>";
                        }//end foreach
                        echo '</table>';
                    } else{
                        echo '<h4 class="text-center">no users in group <b>' . $group['name'] . '</b></h4>';
                    }//end if nothing there
            } catch(PDOException $e){
        echo 'Opps there whre an error<br><br>' . $e->getMessage();
    }
            ?>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 col-md-offset-3">
                    <div class="panel panel-login">
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-12">
                                    <form id="register-form" method="post" role="form" >
                                        <div class="form-group">
                                            <select type="text" name="user_id"  id="user_id" tabindex="3" class="form-control" placeholder="Group ID" required >
                                                <option value="">Assign user to this group</option>
                                                <?php
                                                try{
                                                $stmnt1 = $db->prepare('SELECT id, username FROM `peneh_app_users` ORDER BY `username`');
                                                 $stmnt1 ->execute(); 
                                            } catch(PDOException $e){echo $e->getMessage();}
                                                    foreach($stmnt1 as $option){
                                                        echo "<option value='{$option['id']}'>{$option['username']}</option>";
                                                    }
                                                    ?>
                                            </select>
                                        </div>
                                            <div class="form-group">
                                            <div class="row">
                                                <div class="col-sm-6 col-sm-offset-3">
                                                    <input type="submit" name="register-submit" id="register-submit" tabindex="4" class="form-control btn btn-custom" value="Assign to group">
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php include "../includes/footer.php" ?>
    </body>
</html>
