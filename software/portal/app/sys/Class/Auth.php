<?php

class Auth{
    

    static function return_user_data($db, $table, $row, $field, $val){
        try{
            $sql="SELECT * FROM pp_users WHERE id = :id";
            $stmnt=$db->prepare($sql);
            $stmnt->execute([':id' => $id]);
            return $stmnt->fetchAll();
        }catch(PDOException $e){
            return false;
            return $e->getMessage();
        }
    }

    static function loged_in(){
        if (isset($_session['user_id'])):
            return true;
            $user_id = $_session['user_id'];
        else:
        
            return false;

        endif;

        
    }

}