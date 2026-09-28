<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title> <link rel="stylesheet" href="signinstyle2.css">
</head>
<body>
<div class="signin-container">
        <div class="signincon">
        <h2>Welcome, Please Sign up</h2>
    <form method ="post" action="signup.php">
    <div class ="form-row">
    <label>Username</label>
    <input type ="text" name="username">
    </div>
    <div class ="form-row">
    <label>Password</label>
    <input type ="password" name="password">
    </div>
    <div class ="form-row">
    <label>E-mail Id</label>
    <input type ="text" name="email">
    </div>
    <div class ="form-row">
    <label>Phone No</label>
    <input type ="number" name="phone">
    </div>
    <div class ="form-row">
    <input type ="submit" name = "signup" value="Create Login"></div>
    <div class="backbutton">
    <a href="firstpage.html">Back</a>
    </div>
    </form>
</body>
</html>
<?php

require_once "../controller/controllersignup.php";

?>
