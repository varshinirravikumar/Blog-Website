<?php
require_once "../model/likeblog.php";

session_start();


if(isset($_POST["like"]))
{
    $id = $_SESSION["id"];
    $blog =$_POST["id"];
    $obj = new like();
    $result = $obj->selectblog($id,$blog);
    if($result)
        {
            // Already liked → unlike
            $obj->unlikeblog($id, $blog);
        }
        else
        {
            // Not liked → like
            $obj->likeblog($id, $blog);
        }
    
        // Return to whichever page sent the request
        if($_POST["page"] == "readblog")
            {
                header("Location: ../view/readblog.php");
                exit;
            }
        
            if($_POST["page"] == "myblogs")
            {
                header("Location: ../controller/myblogcontroller.php");
                exit;
            }
        }
        
        ?>