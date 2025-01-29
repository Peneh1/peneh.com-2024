<?php
//menage access
                        if(!verify_user_direct_access($db, $user_id, $url_id)
                           && !verify_user_page_group_access($db, $user_id, $url_id) 
                           && !created_by_user($db, $url_id, $user_id)
                            && !super_admin($db, $user_id)):
                        set_message('You dont have access to this page.');
                            redirect('../index.php');
                        endif;

?>