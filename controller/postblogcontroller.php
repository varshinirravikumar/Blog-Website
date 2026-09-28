<?php
require_once "../model/postblog.php";




if(isset($_POST["postblog"]))
{
$id = $_SESSION["id"];
    $title =$_POST["title"];
    $category = $_POST["category"];
    $content = $_POST["content"];
    // $date = $_POST["date"];

    $obj = new blog();
    $result = $obj->contentblog($id,$title,$category,$content);
    if($result)
    {
    header("Location: ../view/blog.php?success=1");
    exit;
    }
    else
    {
        echo "Couldn't upload blog.";
    }
}

?>