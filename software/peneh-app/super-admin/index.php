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
<!DOCTYPE html>
<html lang="en">
    <?php include "../includes/header.php" ?>
    <body>
        <?php include "../includes/nav.php" ?>

        <div class="container">
            <?php display_message();?>
            <h1 class="text-center">Admin</h1>
            <ul class="nav nav-tabs">
                  <li id="users" class="tab-label active"><a href="#">Users</a></li>
                  <li id="groups" class="tab-label"><a href="#">Groups</a></li>
                  <li id="pages" class="tab-label"><a href="#">Pages</a></li>
            </ul>
                        <!--====================USERS======================-->

            <div id='tab-users' class='tab-content'>
                <?php 
    try{
                    $result =  $db->query('select * from peneh_app_users ORDER BY username');

                    if ($result->rowCount()>0){

                         echo '<table class="table"><tr>
                                        <th>User name</th>
                                         <th>First Name</th>
                                        <th>Last Name</th>
                                        <th>email</th>
                                        <th>Active</th>
                                        <th>Change Status</th>
                                        <th>Joined</th>
                                        <th>Last Login</th>
                                        <th>Delete</th></tr>';

                        foreach ($result as $row){
//change active from 0/1 to yes/no
if($row['active']){$active='Yes'; $change= 'Deactivate';}else{$active='No'; $change = 'Activate';};
                            
                          echo  "<tr>
                                      <td>{$row["username"]}</td>
                                      <td>{$row["first_name"]}</td>
                                     <td>{$row["last_name"]}</td>
                                     <td>{$row["email"]}</td>
                                     <td>{$active}</td>
                                     <td><a href='deactivat.php?id={$row['id']}'>$change<a/></td>
                                     <td>{$row["joined"]}</td>
                                     <td>{$row["last_login"]}</td>
                                     <td><a  href='edit-user.php?id={$row['id']}'>Edit User<a/></td>
                                     <td><a style='color:red;' class='delete' href='delete.php?id={$row['id']}'>Delete<a/></td>
                                     </tr>";
                        }//end foreach
                        echo '</table>';
                    } else{
                        echo 'nothing there';
                    }//end if nothing there
            } catch(PDOException $e){
        echo 'Opps there whre an error<br><br>' . $e->getMessage();
    }
            ?>
            </div>
                        <!--====================GROUPS======================-->

            <div id='tab-groups' class='tab-content'>
                <a href='add_group.php' class="btn btn-success">Add Group</a>
                <?php 
    try{
                    $result =  $db->query('select * from peneh_app_groups ORDER BY name');

                    if ($result->rowCount()>0){

                         echo '<table class="table"><tr><th>Name</th>
                                        <th>Description</th>
                                        <th>Users</th>
                                        <th>Pages</th>
                                        <th>Manage</th></tr>';

                        foreach ($result as $row){

                            
                          echo  "<tr><td>{$row["name"]}</td>
                                     <td>{$row["description"]}</td>";
                         $users_in_group = count_field($db, 'peneh_app_user_group_link', 'group_id', $row['id']);
                         $pages_in_group = count_field($db, 'peneh_app_group_page_link', 'group_id', $row['id']);
                            echo "<td>{$users_in_group}</td>
                            <td>{$pages_in_group}</td>";
                           echo      "<td><a href='manage_group_users.php?id={$row['id']}'>Manage Users</a></td>
                                          <td><a href='edit-group.php?id={$row['id']}'>Edit Group</a></td>

                                          <td><a class='delete' href='delete.php?id={$row['id']}'>Delete<a/></td>

                                    </tr>";
                        }//end foreach
                        echo '</table>';
                    } else{
                        echo 'nothing there';
                    }//end if nothing there
            } catch(PDOException $e){
        echo 'Opps there whre an error<br><br>' . $e->getMessage();
    }
            ?>
            </div>
            <!--====================PAGES======================-->
            <div id='tab-pages' class='tab-content'>
    <a href='add_page.php' class="btn btn-success">Add Page</a>

                <?php 
    try{
                    $result =  $db->query('select * from peneh_app_pages ORDER BY name');

                    if ($result->rowCount()>0){

                         echo '<table class="table"><tr><th>Name</th>
                                        <th>Description</th>
                                        <th>Group</th>
                                        <th>Users</th>
                                        <th>Manage</th></tr>';

                        foreach ($result as $row){

                            
                          echo  "<tr><td><a href='../p/{$row["type"]}/{$row['id']}/{$row['name']}'>{$row["name"]}</a></td>
                                     <td>{$row["description"]}</td> ";
                                      $groups_in_page = count_field($db, 'peneh_app_group_page_link', 'page_id', $row['id']);
                             echo        "<td>{$groups_in_page}</td>";
                            
                                      $users_in_page = count_field($db, 'peneh_app_user_page_link', 'page_id', $row['id']);

                            echo "<td>{$users_in_page}</td>
                            <td><a href='manage_page_users.php?id={$row['id']}'>Manage Page</a></td>
                            <td><a href='edit-page.php?id={$row['id']}'>Edit Page</a></td>
                            <td><a class='delete' href='delete.php?id={$row['id']}'>Delete<a/></td>

                                                
                                    </tr>";
                        }//end foreach
                        echo '</table>';
                    } else{
                        echo 'nothing there';
                    }//end if nothing there
            } catch(PDOException $e){
        echo 'Opps there whre an error<br><br>' . $e->getMessage();
    }
            ?>
            </div>
        </div> <!--Container-->
        <?php include "../includes/footer.php" ?>
        <script>
            //confirm delete
            $(".delete").click(function(e){
                               if(!confirm("Are you sure you want to delete this?")){
                e.preventDefault();
            }
                               });
            //assign ti right tab
            if ( getParameterByName("tab")){
                gotoTab(getParameterByName("tab"));
            } else {
                gotoTab("users");
            }
            gotoTab("users");
            $(".tab-label").click(function(){
                gotoTab($(this).attr('id'));
            });
            function gotoTab(label){
                var current_tab="#tab-"+label;
                console.log("'"+current_tab+"'");
                $(".tab-content").hide();
                $(".tab-label").removeClass("active");
                $(current_tab).show();
                $("#"+label).addClass("active");
            }
        </script>
    </body>
</html>