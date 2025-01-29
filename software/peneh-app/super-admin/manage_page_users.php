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
    if( count_field($db, 'peneh_app_pages', 'id', $_GET['id']) ==  0){
        redirect('index.php');
    } else {
            $page_id = $_GET['id'];
            $page =  return_field_data($db, 'peneh_app_pages', 'id', $page_id);

    }
    
} else {
    reirect('index.php');
}
//post data
if ($_SERVER['REQUEST_METHOD'] == 'POST'){

    $user_id = $_POST['user_id'];
    if($user_id >1000000): //means its a user
                              $user =  return_field_data($db, 'peneh_app_users', 'id', $user_id);
       if(row_exists($db, 'peneh_app_user_page_link', 'page_id', $page_id, 'user_id', $user_id)){
                        set_message('Connection Already Exsist!');
                        }   else {
                                    try{
                                        $stmnt = $db->prepare('INSERT INTO `peneh_app_user_page_link` (page_id, user_id) VALUES (:page_id, :user_id)');
                                         $stmnt ->execute([':page_id' => $page_id, ':user_id'=> $user_id]); 
                                        set_message("User <b>{$user['username']}</b>  has acces to page <b>{$page['name']}</b>", 'success');
                                    } catch(PDOException $e){echo $e->getMessage();}
       }
                                
else: //means its a group
  $group =  return_field_data($db, 'peneh_app_groups', 'id', $user_id);
                                       if(row_exists($db, 'peneh_app_group_page_link', 'page_id', $page_id, 'group_id', $user_id)){
                        set_message('Connection Already Exsist!');
                        }   else {
                                    try{
                                        $stmnt = $db->prepare('INSERT INTO `peneh_app_group_page_link` (page_id, group_id) VALUES (:page_id, :group_id)');
                                         $stmnt ->execute([':page_id' => $page_id, ':group_id'=> $user_id]); 
                                        set_message("<b>{$group['name']}</b>  has access to  page <b>{$page['name']}</b>", 'success');
                                    } catch(PDOException $e){echo $e->getMessage();}
                                       }
    endif;
 }

?>
<!DOCTYPE html>
<html lang="en">
    <?php include "../includes/header.php" ?>
    <body>
        <?php include "../includes/nav.php" ?>

        <div class="container">
            <?php display_message();?>
            <div class="row">
                <div class="col-lg-10 col-lg-offset-1">
                     <?php
//show all users in this page↓=====================================================
    try{
                    $result =  $db->query('select user_id from peneh_app_user_page_link WHERE page_id = ' . $page_id);

                    if ($result->rowCount()>0){

                         echo '<h4 class="text-center">User already have access to page: <b>' . $page['name'] . '</b></h4>
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
                        echo '<h4 class="text-center">no users in page <b>' . $page['name'] . '</b></h4>';
                    }//end if nothing there
            } catch(PDOException $e){
        echo 'Opps there whre an error<br><br>' . $e->getMessage();
    }
//END show all Groups in this page↑=============================================

//show all Groups in this page↓=============================================
try{
                    $result =  $db->query('select * from peneh_app_group_page_link WHERE page_id = ' . $page_id);

                    if ($result->rowCount()>0){

                         echo '<h4 class="text-center">Groups already have access to page: <b>' . $page['name'] . '</b></h4>
                         <table class="table"><tr><th>Group Id</th>
                                            <th>Group Name</th>
                                                                        </tr>';

                        foreach ($result as $row){
                            $group_info = return_field_data($db, 'peneh_app_groups', 'id', $row['group_id']);
                          echo  "<tr><td>{$group_info["id"]}</td>
                                        <td>{$group_info["name"]}</td>
                                        
                                     </tr>";
                        }//end foreach
                        echo '</table>';
                    } else{
                        echo '<h4 class="text-center">no groups in page <b>' . $page['name'] . '</b></h4>';
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
                                            <select type="text" name="user_id"  id="user_id" tabindex="3" class="form-control" placeholder="page ID" required >
                                                <option value="">Assign user to this page</option>
                                                <?php
                                                try{
                                                $stmnt1 = $db->prepare('SELECT id, username FROM `peneh_app_users` ORDER BY `username`');
                                                 $stmnt1 ->execute(); 
                                            } catch(PDOException $e){echo $e->getMessage();}
                                                    foreach($stmnt1 as $option){
                                                        echo "<option value='{$option['id']}'>User: {$option['username']}</option>";
                                                    }
                                                //add to group
                                                try{
                                                $stmnt2 = $db->prepare('SELECT id, name FROM `peneh_app_groups` ORDER BY `name`');
                                                 $stmnt2 ->execute(); 
                                            } catch(PDOException $e){echo $e->getMessage();}
                                                    foreach($stmnt2 as $option){
                                                        echo "<option value='{$option['id']}'>Group: {$option['name']}</option>";
                                                    }
                                                    ?>
                                            </select>
                                        </div>
                                            <div class="form-group">
                                            <div class="row">
                                                <div class="col-sm-6 col-sm-offset-3">
                                                    <input type="submit" name="register-submit" id="register-submit" tabindex="4" class="form-control btn btn-custom" value="Assign to page">
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
