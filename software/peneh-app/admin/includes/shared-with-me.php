<?php 
include 'inc/init.php';
 ?>
<?php
//check if loged in
if ( logged_in()){
    $user_id = $_SESSION['user_id'];
     $username = $_SESSION['username'];

        } else {
                set_message('Please log in to view this page');
                redirect('login.php');
}


$sql = "select p.* from peneh_app_pages p inner join peneh_app_group_page_link gp on gp.page_id=p.id inner join peneh_app_user_group_link gu on gu.group_id=gp.group_id where gu.user_id = {$user_id} union select p.* from peneh_app_pages p inner join peneh_app_user_page_link up ON p.id = up.page_id where up.user_id = {$user_id};
';
";
?>


<!DOCTYPE html>
<html lang="en">
    <?php include INCLUDE_ROOT . "/includes/header.php" ?>
    <body>
        <?php include INCLUDE_ROOT . "/includes/nav.php" ?>

        <div class="container">
         <?php  
        display_message();
            ?>
            <h1 class="text-center"> Welcome <?php echo $username;?>, to your pages</h1>
            <?php
           try{
                    $result =  $db->query($sql);

                    if ($result->rowCount()>0){
                            $pre_group = '';
                         echo '<table class="table">';

                        foreach ($result as $row){
                           if ( $pre_group  != $row['type']){
                               echo "<tr style='background-color:#663800; color:white;'><td>{$row["type"]}</td><td><small>{$row["description"]}</small</td><td></td></tr>
                                        <tr><td></td><td><a href='p/{$row["type"]}/{$row['id']}/{$row['name']}'>{$row["name"]}</a></td>
                                        <td>{$row["description"]}</td>
                                     </tr>";
                           } else {
                               echo"<tr> <td></td><td><a href='p/{$row["type"]}/{$row['id']}/{$row['name']}'>{$row["name"]}</a></td>
                                <td>{$row["description"]}</td></tr>";
                           }
                            $pre_group = $row['type'];
                        }//end foreach
                        echo '</table>';
                    } else{
                        echo '<h4 class="text-center">no pages avalibale for user <b>' . $username . '</b></h4>';
                    }//end if nothing there
            } catch(PDOException $e){
        echo 'Opps there whre an error<br><br>' . $e->getMessage();
    }
            ?>
         
        </div> <!--Container-->
        
        <?php include "includes/footer.php" ?>
    </body>
</html>