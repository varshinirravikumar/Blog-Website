<?php

require_once "../config/database.php";

class select
{
    public function selectuser($username)
    {
        global $con;
        $sql = "select id,username,password,email_id,phone_no from blogtable where username = :username";
        $stm = $con->prepare($sql);
        $stm->bindParam(":username",$username);
        
      $stm->execute(); 
        return $stm->fetch(PDO::FETCH_ASSOC);
    }
}

?>