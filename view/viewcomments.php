<?php
session_start();
if(!isset($_SESSION["id"]))
{
    header("Location:firstpage.html");
    exit;
}
require_once "../controller/viewcommentscontroller.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .container
        {
            border: 2px solid black;
  font-size: 8px;
  margin-top: 10px;
  /* width: fit-content; */
  padding: 10px;
  text-align: left;
  border-radius: 11px;
  box-shadow: 2px 4px #8080807a;
        }
        .container1
        {
            background-color: ghostwhite;
  width: 100%;
  height: 100%;
        }
    </style>
</head>
<body>
    <div class="container1">
<?php

if($comments)
{
    
    foreach($comments as $comment)
    {
        ?>
        <div class ="container">
            <h2><<?php echo "User ID: " . $comment['id']; ?></h2>

            <h3>
                <?php echo "Username: " . $comment['username']; ?>
            </h3>

            <p>
                <?php echo "Comment: " . $comment['comment']; ?>
            </p>
    
            </div>
        <?php
    }
}
else
{
    echo "No comments";
}

?> 
</div>
</body>
</html>