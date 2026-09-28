<?php
require_once "../config/database.php";

class blog
{
    public function retrieve($id)
    {
        global $con;
        $sql = "select id,title,category,content from content_table where user_id=:id";
        $stm = $con->prepare($sql);
        $stm->bindparam(":id",$id);
        $stm->execute();
        return $stm->fetchALL(PDO::FETCH_ASSOC);

    }
    public function delete($id)
    {
        global $con;
        $sql = "delete from content_table where id=:id";
        $stm = $con->prepare($sql);
        $stm->bindparam(":id",$id);
        return $stm->execute();
    }
}

?>