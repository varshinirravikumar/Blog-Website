<?php
require_once "../model/contentdisplay.php";




if (isset($_POST["selectblog"])) {

    $title = $_POST['title'];
    $obj = new read();
    $blog = $obj->getblog($title);
}
?>
 