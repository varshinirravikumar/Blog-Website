<?php
require_once "../config/database.php";


class like
{
    public function selectblog($id,$blog)
    {
        global $con;
        $sql = "select user_id,blog_id from likes where user_id =:user_id and blog_id = :blog_id";
        $stm = $con->prepare($sql);
        $stm->bindparam(":user_id",$id);
        $stm->bindparam(":blog_id",$blog);
        $stm->execute();
        return $stm->fetch(PDO::FETCH_ASSOC);
    }
    public function likeblog($id,$blog)
    {
        global $con;
        $sql = "insert into likes (user_id,blog_id) values(:user_id,:blog_id)";
        $stm = $con->prepare($sql);
        $stm->bindparam(":user_id",$id);
        $stm->bindparam(":blog_id",$blog);
        $stm->execute();
      
    }
    public function unlikeblog($id,$blog)
    {
        global $con;
        $sql = "delete from likes where user_id=:user_id and blog_id=:blog_id";
        $stm = $con->prepare($sql);
        $stm->bindparam(":user_id",$id);
        $stm->bindparam(":blog_id",$blog);
        $stm->execute();
    }
    public function countlikes()
    {
        global $con;
        $sql = "select blog_id, count(*) as total_count from likes group by blog_id";
        $stm=$con->prepare($sql);
        $stm->execute();
        return $stm->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>