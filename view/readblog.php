<?php
session_start();

if (!isset($_SESSION["id"])) {
    header("Location: firstpage.html");
    exit;
}
require_once "../controller/readblogcontroller.php";

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link rel="stylesheet" href="contentdesign.css">
    <style>
        .border
        {
            border: 2px solid #f6e5e5;
            margin: 40px;
            border-radius: 20px;padding: 38px;
        }
        .button
        {
            font-size: 18px;
            font-size: 18px;
            margin: 3px;
            margin-top: 14px;
        }
        .comment-textbox
        {
            display: none;
            border:none;
            outline:none;
            border-bottom:1px solid black;
            width:300px;
            padding:7px 0;
            font-size: 18px;
            background: transparent;
            border-radius: 0;
        }
        .comment-textbox.show
        {
            display:inline-block;
        }
        .buttoncommt
        {
            cursor: pointer;
            padding: 10px;            
            margin-left: 33px;
            position: relative;
        }
        .buttoncommt::after
        {
            content: attr(data-tooltip);
            position: absolute;
            transform:translateX(-50%);
            bottom:100%;
            left:50%;
            opacity: 0;
            background-color: black;
            color: white;
            padding: 5px 8px;
            border-radius: 5px;
            white-space: nowrap;
            pointer-events: none;
            transition: opacity 0.2s ease;

        }
        .buttoncommt:hover::after
        {
            opacity: 1;
        }
        .hidden
        {
            display: none;
        }
        .commentblog.show
{
    display: inline-block;
}
a
{
    text-decoration: none;
 
  font-size: 18px;
  color: black;
  width: 56px;

  margin: 10px;
  background-color: white;
  border-radius: 6px;
  justify-content: center;
  
  display: flex;
  padding: 7px;
  border: 2px solid black;
}
a:hover
{
    color:blue;
    
}
</style>
</head>
<body>
    <div class="box">
<div class="container">
<div class="top-container">
    <form method="post" action="../view/contentdisplay.php">
             
            
        <select name="title">
        <option value="">Search by Title</option>
        <?php 
        foreach($titles as $title)
        {?>
            <option value="<?php echo $title['title']; ?>">

            <?php echo $title['title'];?>
            </option>
        <?php } ?>

     </select>
    
    <input type="submit" name ="selectblog" value="search"><a href="blog.php">Back</a></form></div>
    
    <?php 
//        session_start();
$id = $_SESSION["id"];
// $blog =$blog["id"];

?>

<?php 


foreach($uniqueBlogs as $blog)
{?>
<div class = "border">
<div class="title-content">
<h2><?php echo "User_Id: " . $blog['user_id']; ?></h2>
<h2><?php echo "Blog_Id :" .$blog["id"] ; ?> </h2>
<p><?php echo "Author: " . $blog['username']; ?></p>
<h2><?php echo "Title :" ." " .$blog['title']; ?></h2>
<p><?php echo "Category:" . " " .$blog['category']; ?></p>
<p><?php echo "Dated:" . " " .$blog['only_date']; ?></p>


</div>


<div class = "content-container">
<p><?php echo $blog['content']; ?></p></div>


<form action="../controller/likeblogcontroller.php" method="post">

        <input type="hidden"
               name="id"
               value="<?php echo $blog['id']; ?>">
               <input type="hidden"
           name="page"
           value="readblog">
        <button type="submit" name="like">
            Like
        </button>

        <span>
            <?php echo $blog['total_likes']; ?> Likes
        </span>

    </form>








<form action ="../view/viewcomments.php" method="post">
<div class="button">
    <input type="hidden"
           name="blog_id"
           value="<?php echo $blog['id']; ?>">
<input type = "submit" name ="comments" value="comments">
</div>
</form>

<form id="commentForm<?php echo $blog['id']; ?>"
action="../controller/commentblogcontroller.php"
method="post">


<div class ="button-container">
<button type="button" class="buttoncommt" data-tooltip="comment">+</button> 
<input type = "text" placeholder="Add a Comment" class="comment-textbox" name="comment">
<!-- <input type="submit" class="commentblog hidden" value ="Comment a Blog" name="id"> -->
<button type="submit" class="commentblog hidden" name="postcomment" value="<?php echo $blog['id']; ?>">
Comment a Blog
</button>
</div>



</form>

</div>




<?php } ?></div>

<?php

if(isset($_GET["success"]))
{
    ?>
    <div id ="success">
       
    </div>
<?php } ?>

</div>

<script>
        const buttoncommt = document.querySelectorAll('.buttoncommt');
        buttoncommt.forEach(function(button)
        {
        button.addEventListener('click',function() 
        {
            const textbox = this.nextElementSibling;
            const submitbutton = textbox.nextElementSibling;

            textbox.classList.toggle('show');
            submitbutton.classList.toggle('show');

            if(textbox.classList.contains('show'))
            {
                textbox.focus();
            }


        });
        });
</script>





</body>
</html>
