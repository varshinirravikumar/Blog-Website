<?php
require_once "../model/viewcomments.php";
// session_start();
$comments = [];
if(isset($_POST["comments"]))
{
$blog_id = $_POST["blog_id"];
    $obj = new comments();
    $comments = $obj->commentretrieve($blog_id);
    
}
?>
