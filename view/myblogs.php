<!DOCTYPE html>
<html lang="en">

<head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
        <style>
                .container {
                        border: 2px solid black;
                        margin: 17px;
                        padding: 16px;
                        text-align: justify;
                        font-size: 17px;
                        line-height: 32px;
                        background: linear-gradient(#ff647f,darkmagenta);
                        color: whitesmoke;
                        border-radius: 10px;
                }
                a
                {
                        text-decoration: none;
                        color: white;
                        width: 40px;
                        background-color: darkmagenta;
                        display: flex;
                        border-radius: 10px;
                        justify-content: center;
                        padding: 4px;
                }
        </style>
</head>

<body>

        <?php
        //        session_start();
        $id = $_SESSION["id"];
        // $blog =$blog["id"];
        
        ?>

        <?php foreach ($result as $blog) {

                $likescount = 0;

                foreach ($res as $like) {
                        if ($like["blog_id"] == $blog["id"]) {
                                $likescount = $like["total_count"];
                        }
                }

                // display $likecount here
        



                ?>
                <div class="container">
                <a href="../view/blog.php">Back</a>
                        <h2><?php echo "User_Id :" . $id; ?> </h2>
                        <h2><?php echo "Blog_Id :" . $blog["id"]; ?> </h2>
                        <h2><?php echo $blog["title"]; ?> </h2>
                        <p> <?php echo "Category: " . $blog["category"]; ?></p>
                        <p><?php echo "Content: " . $blog["content"]; ?></p>
                        <p><?php echo "Likes: " . $likescount; ?></p>


                        <form method="post" action="../controller/myblogcontroller.php">
                                <input type="hidden" name="id" value="<?php echo $blog["id"]; ?> ">
                                <button name="delete" value="delete">
                                        Delete
                                </button>
                        </form>
                        <form method="post" action="../controller/likeblogcontroller.php">
                                <input type="hidden" name="id" value="<?php echo $blog["id"]; ?>">
                                <input type="hidden" name="page" value="myblogs">
                                <button name="like" value="Like">
                                        Like
                                </button>

                        </form>




                </div>
        <?php } ?>

</body>

</html>