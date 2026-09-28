<?php 
require_once "../config/database.php";

class comment
{
    public function commentblog($id,$blog,$comment)
    {
        global $con;
        $sql ="insert into comments(user_id,blog_id,comment) values(:user_id,:blog_id,:comment)";
        $stm = $con->prepare($sql);
        $stm->bindparam(":user_id",$id);
        $stm->bindparam(":blog_id",$blog);
        $stm->bindparam(":comment",$comment);
        return $stm->execute();
    }
}


?>