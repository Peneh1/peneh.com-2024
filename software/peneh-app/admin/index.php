<?php
include  '../inc/init.php';

if(!$_SESSION['user_id']):

            set_message('Please log in to view this page');
            redirect('../index.php');
endif;
//check for privalig to page
$user_id = $_SESSION['user_id'];
if( !verify_admin_access($db, $_SESSION['user_id'])):

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
                
                <li id="pages" class="tab-label"><a href="#">Blogs</a></li>
                <li id="files" class="tab-label"><a href="#">Files</a></li>

                  <li id="groups" class="tab-label active"><a href="#">Groups</a></li>
                <li id="my-info" class="tab-label "><a href="#">My Info</a></li>
            </ul>
            
            
                <!--====================PAGES======================-->
            <div id='tab-pages' class='tab-content'>
    <a href='blogs/add_page.php' class="btn btn-success">New Blog</a>

                               <?php include 'includes/blogs.php';?>

            </div>
                   <!--=======↑=============END PAGES=============↑=========-->
            
                        <!--====================GROUPS======================-->

            <div id='tab-groups' class='tab-content'>
                <a href='groups/add_group.php' class="btn btn-success">Add Group</a>
                
               <?php include 'includes/groups.php';?>
                
            </div>
          <!--=======↑=============END GROUPS=============↑=========-->
             <!--====================FILES======================-->

            <div id='tab-files' class='tab-content'>
                <a href='files/upload-file.php' class="btn btn-success">Upload new File</a>
                
               <?php include 'includes/file.php';?>
                
            </div>
          <!--=======↑=============END FILES=============↑=========-->

             <!--====================MY INFO======================-->
            <div id='tab-my-info' class='tab-content'>

                               <?php include 'includes/my-info.php';?>

            </div>
                   <!--=======↑=============END MY INFO=============↑=========-->
            

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
            gotoTab("pages");
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