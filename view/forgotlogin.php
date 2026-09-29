<?php

require_once "../controller/forgotcontroller.php";

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
    .show-password 
{
    display: flex;
  align-items: center;
  gap: 4px;
  font-size: 16px;
  color: blue;
  cursor: pointer;
  margin: 10px;
}
    </style>
    
    
    
    <link rel="stylesheet" href="signinstyle2.css">
<body>
    
    <div class="signin-container">
        <div class="signincon"><h4>Forgot Login</h4>
    <form method ="post" action="forgotlogin.php">
    <div class ="form-row">
    <label>Username</label>
    <input type ="text" name="username"  value ="<?php echo $_SESSION['name'] ?? '';?>" > <br></div>
    <div class ="form-row">
    <label>E-mail Id</label>
    <input type ="text" name="email" value = "<?php echo $_SESSION['email'] ?? ''; ?>"> <br></div>
    <div class ="form-row">
    <label>Phone No</label>
    <input type ="number" name="phone" value ="<?php echo $_SESSION['phone'] ?? ''; ?>"><br><br></div>

    <?php if(isset($_SESSION["name"])) { ?>
    <div class ="form-row1">
    <label id="wrap">Enter new Password here</label>
<div class="sameline">
<input type="password" name="newpassword" id="myInput">

<label class="show-password">
    <input type="checkbox" id="checkbox" onclick="myFunction()">
    Show Password
</label>
</div>
</div>
    <div class ="form-row">
    <input type ="submit" name = "update" value="Update Password"></div>
    <?php } else { ?>
    <input type ="submit" name = "forgot" value="Forgot Password">
   
    <?php } ?>
 
    <?php 
    if(!empty($error))
    { ?>
      <h3><?php echo $error; ?></h3>
    <?php } ?>
    <div class="backbutton">
    <a href="firstpage.html">Back</a>
    </div>


    </form>

    <script>
function myFunction() {
  var x = document.getElementById("myInput");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
}
</script>
    </div>
</body>
</html>
