<?php
include '../../inc/init.php';

if(!$_SESSION['user_id']):

            set_message('Please log in to view this page');
            redirect(ROOT . '/index.php');
endif;
//check for privalig to page
$user_id = $_SESSION['user_id'];
if( !verify_admin_access($db, $_SESSION['user_id'])):

        set_message('You dont have permission to view this page');
        redirect(ROOT . '/index.php');

   
 endif;

//if get id in url
If($_GET['id']){
    $group_id = $_GET['id'];
    
            //id dosnt exsist
    if(count_field($db, 'peneh_app_groups', 'id', $group_id) == 0){redirect('index.php');}

    $page_info = return_field_data($db, 'peneh_app_groups', 'id', $group_id);
     $name = $page_info['name'];
    $description = $page_info['description'];
} else {
    redirec(ROOT . '/index.php');
}
?>
<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST'){

    $name = $_POST['name'];
    $description = $_POST['description'];
    
            if(strlen($name) <3){
                $error[] = 'Group Name must be at least 3 characters';
            }
    
     if(strlen($description) <10){
                $error[] = 'Description must be at least 10 characters';
            }
    if(count_field($db, 'peneh_app_groups', 'name', $name)){
                        $error[] = 'Group Name Already Exsist!';
                        } 
    if(!isset($error)){
          
        try{
            $stmnt = $db->prepare('UPDATE `peneh_app_groups` SET  name = :name, description = :description WHERE id = ' . $group_id);
             $stmnt ->execute([':name' => $name, ':description'=> $description]); 
            set_message('Group Successfully Updated', 'success');
            redirect(ROOT . '/index.php?tab=groups');
        } catch(PDOException $e){echo $e->getMessage();}
           
    }
} else{
   }
?>
<!DOCTYPE html>
<html lang="en">
    <?php include INCLUDE_ROOT . "/includes/header.php" ?>
    <body>
        <?php include INCLUDE_ROOT . "/includes/nav.php" ?>

        <div class="container">
            <?php
       if(isset($error)){
                        foreach($error as $msg){
    
                            echo '<p class="bg-danger text-center">' . $msg . '</p>';

                        } 
                    }
    ?>
            <div class="row">
                <div class="col-lg-6 col-lg-offset-3">
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
                                            <input type="text" name="name" id="name" tabindex="1" class="form-control" placeholder="Group Name" required value="<?php echo $name;?>">
                                        </div>
                                        <div class="form-group">
                                            <textarea name="description" id="descr" tabindex="8" class="form-control" placeholder="Description - Tell us about your organization ?"><?php echo $description;?></textarea>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-sm-6 col-sm-offset-3">
                                                    <input type="submit" name="register-submit" id="register-submit" tabindex="4" class="form-control btn btn-custom" value="Update Group">
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
        <?php include INCLUDE_ROOT . "/includes/footer.php" ?>
    </body>
</html>
