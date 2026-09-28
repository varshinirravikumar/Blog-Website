<?php

session_start();

if (!isset($_SESSION["id"])) {
    header("Location: firstpage.html");
    exit;
}

require_once "../controller/postblogcontroller.php";
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="blog.css">

</head>
<body>
<div class="container"><h1>OpinionBlogs.com</h1>
    <a href="../controller/logout.php">Logout</a>
</div>
<div class="container2">


<details id = "profilealign"><summary>My Profile</summary>

<div class="profile-values">
<div>

<?php 



$id = $_SESSION["id"];

echo "User_Id :" ." " .$id;
 ?> 
 </div>
<div><?php echo $_SESSION["username"]; ?> </div>
<div> <?php echo $_SESSION["email_id"]; ?> </div>
<div><?php echo $_SESSION["phone_no"]; ?></div>
</details>


<div class="wrapper">
<button id="plus-btn" data-tooltip="Create a blog"> + </button>
    
    <form action="blog.php" method="post">

   
    <div class="blog">
    <label class="hidden" id = "title-label">Title</label>
    <input type="textbox" id="title-blog" class="hidden" name="title"></div>

    <div class="blog">
    <label class="hidden" id="blog-category" >Category</label>
    <input type="textbox" id="blog-category1" class="hidden" name="category"></div>
    
    <!-- <br> -->
    <div class="blog">
    <label class="hidden" id="blog-content">Content</label>
    <textarea id="textbox" class="hidden" placeholder="Type a blog" name="content"></textarea></div>

    <div class="blog">
        
    <input type="submit" id="post-blog" class="hidden" value ="Post a Blog" name="postblog"></div>


    
    </form>
    
    <span class="eye-wrapper">
        <a href="readblog.php">
        <i class="fa fa-eye my-eye-icon"></i></a>
        <span class="eye-tooltip">Read a blog</span>
    </span>
    <form action="../controller/myblogcontroller.php" method="post">
<div class="blogbutton">
<input type="submit" name="myblogs" value="My Blogs">
</div>
</form>

</div>
<?php

if(isset($_GET["success"]))
{
    ?>
    <div id ="success">
        Blog Posted Successfully
    </div>
<?php } ?>
</div>
    <script>
            const plusBtn = document.getElementById('plus-btn');
            const textbox = document.getElementById('textbox');
            const postblog = document.getElementById('post-blog');
           
            const titlehead = document.getElementById('title-label');
            const titleblog = document.getElementById('title-blog');
            const blogcategory = document.getElementById('blog-category');
            const blogcategory1 = document.getElementById('blog-category1');
            const blogcontent = document.getElementById('blog-content');
            

            // Toggle the text box visibility on click
            plusBtn.addEventListener('click', () => 
            {
            textbox.classList.toggle('hidden');
            postblog.classList.toggle('hidden');
            titleblog.classList.toggle('hidden');
            titlehead.classList.toggle('hidden');
            blogcategory.classList.toggle('hidden');
            blogcategory1.classList.toggle('hidden');
            blogcontent.classList.toggle('hidden');
            
        
                // Optional: Automatically focus the input so the user can start typing instantly
            if (!textbox.classList.contains('hidden')) {
            textbox.focus();
            }
            });
            
   </script>




</body>
</html>



