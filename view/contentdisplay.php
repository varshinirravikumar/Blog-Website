<?php
session_start();
if(!isset($_SESSION["id"]))
{
    header("Location:firstpage.html");
    exit;
}
require_once "../controller/contentdisplay.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title><link rel="stylesheet" href="contentdisplay2.css">
</head>
<body>
    <div class="container2">
<div class="container1">

<div class="title-content">
<h2><?php echo "Id :" .$blog['id']; ?></h2>
<h2><?php echo "Title :" ." " . $blog['title']; ?></h2>
<p><?php echo "Author: " . $blog['username']; ?></p>
<p><?php echo "Category:" . " " . $blog['category']; ?></p>

<p><?php echo "Dated:" . " " . $blog['only_date']; ?></p>
</div>


<div class = "content-container">
<p><?php echo $blog['content']; ?></p></div>
</div></div>
</body>
</html>