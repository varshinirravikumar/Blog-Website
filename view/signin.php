<?php

require_once "../controller/controllersignin.php";

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="signinstyle2.css">
    <style>
        /* a
        {
            text-decoration: none;
            color:black;
        } */
    </style>
</head>
<body>
    <div class="signin-container">
        <div class="signincon">
        <h2>Please Sign in</h2>

        <?php
        if(!empty($error))
        {?>
            <p style="color: red;"><?php echo $error; ?></p>
        <?php } ?>






    <form method ="post" action="signin.php">
    <div class ="form-row">
    <label>Username</label>
    <input type ="text" name="username" ><br></div><div class ="form-row">
    <label>Password</label>
    <input type ="password" name="password"><br></div>
    <div class ="form-row">
    <input type ="submit" name = "signin" value="Sign in" id="inputalign"></div>
    <a href="forgotlogin.php">Forgot Login? click here</a>
    <div class="backbutton">
    <a href="firstpage.html">Back</a>
    </div>
    </form>
    </div>

    </div>

    
</body>
</html>

