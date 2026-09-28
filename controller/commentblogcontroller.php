<?php 
require_once "../model/commentblogmodel.php";

session_start();
if(isset($_POST["postcomment"]))
{
    // echo "<pre>";
    // print_r($_POST);
    // echo "</pre>";
    // exit;

    $id = $_SESSION["id"];
    $blog =$_POST["postcomment"];
    $comment = $_POST["comment"];
    $obj = new comment();
    $result = $obj->commentblog($id,$blog,$comment);
    if($result)
        {
        header("Location: ../view/readblog.php?success=1");
        exit;
        }
        else
        {
            echo "Couldn't upload a comment.";
        }
}

?>