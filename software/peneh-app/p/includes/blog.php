<?php
$contant = return_field_data($db, 'peneh_app_pages', 'id', $url_id);
    

?>
<!DOCTYPE html>
<html lang="en">
    <?php include "../includes/header.php" ?>
    <body>
        <?php include "../includes/nav.php" ?>

        <div class="container">
            <h1 class="text-center"><?php echo $contant['name'];?></h1>
            <pre><?php echo $contant['contant'];?></pre>
            
        </div> <!--Container-->
        
        <?php include "../includes/footer.php" ?>
    </body>
</html>