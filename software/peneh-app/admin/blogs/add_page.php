<?php
include '../../inc/init.php';


if(!$_SESSION['user_id']):

            set_message('Please log in to view this page');
            redirect('../login.php');
endif;
//check for privalig to page
$user_id = $_SESSION['user_id'];
if( !verify_admin_access($db, $_SESSION['user_id'])):

        set_message('You dont have permission to view this page');
        redirect('../index.php');

   
 endif; 
?>
<?php

//if submit
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $name = $_POST['name'];
    $description = $_POST['description'];
    $type = 'blog';
    $contant  = $_POST['contant'];
    $created_by = $_SESSION['user_id'];
     if(strlen($name) <3){
                $error[] = 'Group Name must be at least 3 characters';
            }
    
     if(strlen($description) <10){
                $error[] = 'Description must be at least 10 characters';
            }
    
    if(!isset($error)){
            
        
        try{
            $stmnt = $db->prepare('INSERT INTO `peneh_app_pages` (name,   description, type, contant, created_by) VALUES (:name,   :description, :type, :contant, :created_by)');
             $stmnt ->execute([':name' => $name, ':description'=> $description, ':type'=>$type, ':contant'=>$contant, ':created_by'=> $created_by]); 
            set_message('Page Successfully Created', 'success');
            redirect('../index.php?tab=pages');
        } catch(PDOException $e){echo $e->getMessage();}
    }
} else{
    $name = '';
    $description = '';
     $url = '';
    $group_id ='';
    $contant ='';
}
?>
<!DOCTYPE html>
<html lang="en">
    <?php include  INCLUDE_ROOT . "/includes/header.php" ?>
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
                                            <input type="text" value="<?php echo $name;?>" name="name" id="name" tabindex="1" class="form-control" placeholder="Page Name" required >
                                        </div>
                                        <div class="form-group">
                                            <input name="description" id="description"  class="form-control" required placeholder="Enter description" value="<?php echo $description;?>">
                                        </div>
                                         <div class="form-group">
                                            <textarea name="contant" id="contant" tabindex="18" style="height: 300px;" class="form-control" required placeholder="Enter your page contant"><?php echo $contant;?></textarea>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-sm-6 col-sm-offset-3">
                                                    <input type="submit" name="register-submit" id="register-submit" tabindex="4" class="form-control btn btn-custom" value="Add Page">
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
