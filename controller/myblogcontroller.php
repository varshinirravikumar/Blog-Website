<?php
session_start();
require_once "../model/myblogmodel.php";
require_once "../model/likeblog.php";

if(!isset($_SESSION["id"]))
{
    header("Location: ../firstpage.html");
    exit;
}





        $id = $_SESSION["id"];
        $obj = new blog();
        $result = $obj->retrieve($id);

        $obj = new like();
$res =  $obj->countlikes();

        require_once "../view/myblogs.php";
      

if($_SERVER["REQUEST_METHOD"] == "POST")
{
if(isset($_POST["delete"]))
{
    $id = $_POST["id"];
    $obj = new blog();
    $result = $obj->delete($id);
    header("Location: ../controller/myblogcontroller.php");
    exit;
}
}
?>

