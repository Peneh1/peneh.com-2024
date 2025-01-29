    <nav class="navbar navbar-fixed-top" style="display: none">
        <div class="container1">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <span class="navbar-brand">The Peneh App</span>
            </div>
            <div id="navbar" class="collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <li class="active"><a href="/index.php">Home</a></li>
                    <li><a href="<?php echo ROOT;?>/page1.php">Page 1</a></li>
                    <li><a href="<?php echo ROOT;?>/page2.php">Page 2</a></li>
                    <li><a href="<?php echo ROOT;?>/page3.php">Page 3</a></li>
                  
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <?php
                    if(logged_in()){
                       // echo "<li><a href='{ROOT}account.php'>{$_SESSION['username']}'s Account</a></li>";
                        echo '<li><a href=" ' . ROOT  . '/system/logout.php">Log Out</a></li>';

                             if(verify_admin_access($db, $user_id)):
                                        echo '<li><a href=" ' . ROOT  . '/admin/">Admin</a></li>';
                            elseif(super_admin($db, $user_id)):
                             echo '<li><a href=" ' . ROOT  . '/super-admin/">Super Admin</a></li>';

                                endif;

                        
                        
                    } else {
                        echo '<li><a href=" ' . ROOT  . '/login.php">Login</a></li>';
                        echo '<li><a href=" ' . ROOT  . '/register.php">Register</a></li>';
                    }
                         
                    
                    ?>
                   
                </ul>
            </div><!--/.nav-collapse -->
        </div>
    </nav>
