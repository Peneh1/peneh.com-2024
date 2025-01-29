<?php

require_once 'init.php';

include 'Class/Auth.php';

if (Auth::loged_in() === false):
    
    include 'templates/login.html';

elseif($user = Auth::return_user_data()):

    include 'templates/index.html';

else: 

    include 'templates/login.html';

endif;

?>