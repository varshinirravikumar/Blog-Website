<?php
require_once "../config/database.php";

class blog
{
    public function contentblog($id,$title,$category,$content)
    {
        global $con;
        $sql = "insert into content_table (user_id,title,category,content) values (:id,:title,:category,:content)";
        $stm = $con->prepare($sql);
        $stm->bindparam(":id",$id);
        $stm->bindparam(":title",$title);
        $stm->bindparam(":category",$category);
        $stm->bindparam(":content",$content);
        return $stm->execute();

    }
    // public function retrieve($id)
    // {
    //     global $con;
    //     $sql = "select title,category,content from content_table where user_id=:id";
    //     $stm = $con->prepare($sql);
    //     $stm->bindparam(":id",$id);
    //     $stm->execute();
    //     return $stm->fetchALL(PDO::FETCH_ASSOC);

    // }
}

?>