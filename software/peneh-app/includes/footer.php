        <div class="container">
          
            <p class="text-center">&copy; <a href='<?php echo ROOT;?>/index.php'>The Peneh App</a> <?php echo date('Y');?>
              <?php
              if(logged_in()){
                        echo '- <a href=" ' . ROOT  . '/system/logout.php">Log Out</a>';}
            ?></p>
        </div> <!--Container-->
