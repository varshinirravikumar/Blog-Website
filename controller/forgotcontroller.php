<?php

session_start();
if (!isset($_POST["forgot"]) && !isset($_POST["update"])) {
    session_unset();
}
require_once "../model/forgotloginmodel.php";
$loginretrieve = false;


if (isset($_POST["forgot"])) 
{
    $name = $_POST["username"];
    $email = $_POST["email"];
    $phone = $_POST["phone"];
    if(empty($name)||empty($email)||empty($phone))
    {
       $error = "please fill all the fields";
    }
    else
    {
    $obj = new forgot();
    $loginretrieve = $obj->forgotlogin($name, $email, $phone);
    
 if (!$loginretrieve) 
    {

       $error =  "given information is wrong"; 
    } 
    else 
    {

        $_SESSION["name"] = $name;
        $_SESSION["email"] = $email;
        $_SESSION["phone"] = $phone;
    }
    }
}




if (isset($_POST["update"])) {
    $password = $_POST["newpassword"];
    $passwordhash = password_hash($password, PASSWORD_DEFAULT);
    $name = $_SESSION["name"];
    $email = $_SESSION["email"];
    $phone = $_SESSION["phone"];
    if(empty($name)||empty($email)||empty($phone)||empty($password))
    {
        $error = "please fill all the fields";
    }
    elseif(strlen($password)<8)
    {
        $error = "Password should contain atleast 8 character";
    }
    elseif(!preg_match("#[A-Z]+#",$password))
    {
        $error ="Password must contain 1 uppercase letter";
    }
    elseif(!preg_match("#[a-z]+#",$password))
    {
       echo "Password must contain 1 lowercase letter";
    }
    elseif(!preg_match("#[0-9]+#",$password))
    {
        $error ="Password must contain 1 number atleast";
    }
    elseif(!preg_match("/[^a-zA-Z0-9]/",$password))
    {
        $error = "Password should contain 1 special character";
    }

    else
    {
    $obj = new forgot();
    $res = $obj->updatepassword($name, $passwordhash, $email, $phone);
    if ($res) 
    {

        $error =   "password updated successfully";
        
    } 
    else 
    {
        $error =  "update failed";
    }
    }
}
?>