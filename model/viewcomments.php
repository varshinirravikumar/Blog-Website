<?php 
require_once "../config/database.php";


class comments
{
    public function commentretrieve($blog_id)
    {
        global $con;
        $sql  = "select comments.blog_id,blogtable.id,blogtable.username,comments.comment from comments inner join blogtable on  blogtable.id = comments.user_id where comments.blog_id = :blog_id";
        $stm = $con->prepare($sql);
        $stm->bindparam(":blog_id",$blog_id);
        $stm->execute();
        return $stm->fetchAll(PDO::FETCH_ASSOC);





    }
}
?>