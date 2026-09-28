<?php

require_once "../config/database.php";


class read
{
    
    public function getblog($title)
    {
        global $con;
        // $sql = "select *, DATE(date) AS only_date from content_table where title=:title";
        $sql = "select blogtable.id,blogtable.username,content_table.title,content_table.category,content_table.content,DATE(content_table.date) as only_date from content_table inner join 
        blogtable on content_table.user_id = blogtable.id where content_table.title=:title";
        $stm=$con->prepare($sql);
        $stm->bindparam(":title",$title);
        $stm->execute();
        return $stm->fetch(PDO::FETCH_ASSOC);

        


    }

}








?>