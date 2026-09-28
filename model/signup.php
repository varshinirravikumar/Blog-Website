<?php
require_once "../config/database.php";

class signin
{
    public function insertuser($username,$password,$email,$phone)
    {
        global $con;
        $sql = "insert into blogtable (username,password,email_id,phone_no) values (:username,:password,:email,:phone)";
        $stm = $con->prepare($sql);
        $stm->bindparam(":username",$username);
        $stm->bindparam(":password",$password);
        $stm->bindparam(":email",$email);
        $stm->bindparam(":phone",$phone);
        return $stm->execute();

    }
    public function userexists($username,$email)
    {
        global $con;
        $sql = "select username from blogtable where username =:username and email_id = :email";
        $stm = $con->prepare($sql);
        $stm->bindparam(":username",$username);
        $stm->bindparam(":email",$email);
        $stm->execute();
        return $stm->fetch(PDO::FETCH_ASSOC);
    }
}
?>