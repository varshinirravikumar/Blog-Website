<?php

require_once "../config/database.php";


class read
{
    public function readblog()
    {
        global $con;
        $sql = "SELECT content_table.id,content_table.user_id,content_table.title,content_table.category,content_table.content, DATE(content_table.date) as only_date,blogtable.username  FROM content_table INNER JOIN blogtable
        ON content_table.user_id = blogtable.id";
        $stm= $con->prepare($sql);
        $stm->execute();
        return $stm->fetchAll(PDO::FETCH_ASSOC);
    }
    public function getTitles()
    {
        global $con;
        $sql = "select distinct title from content_table";
        $stm = $con->prepare($sql);
        // $stm->bindparam(":title",$title);
        $stm->execute();
        return $stm->fetchAll(PDO::FETCH_ASSOC);
    }
    public function getblog($title)
    {
        global $con;
        $sql = "select * from content_table where title=:title";
        $stm=$con->prepare($sql);
        $stm->bindparam(":title",$title);
        $stm->execute();
        return $stm->fetch(PDO::FETCH_ASSOC);
    }
    
}
?>