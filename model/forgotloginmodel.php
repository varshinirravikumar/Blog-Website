<?php
require_once "../config/database.php";
class forgot
{
   public function forgotlogin($name,$email,$phone)
   {
    global $con;
    $sql = "select username,email_id,phone_no from blogtable where username =:username and email_id = :email and phone_no =:phone";
    $stm =$con->prepare($sql);
    $stm->bindparam(":username",$name);
    $stm->bindparam(":email",$email);
    $stm->bindparam(":phone",$phone);
    $stm->execute();
    return $stm->fetch(PDO::FETCH_ASSOC);
   }
   public function updatepassword($name,$passwordhash,$email,$phone)
   {
      
      global $con;
      $sql = "update blogtable set password = :newpassword where username =:username and email_id = :email and phone_no =:phone";
      $stm = $con->prepare($sql);
      $stm->bindparam(":username",$name);
      $stm->bindparam(":newpassword",$passwordhash);
      $stm->bindparam(":email",$email);
      $stm->bindparam(":phone",$phone);

      return $stm->execute();
      
   }

}
?>



