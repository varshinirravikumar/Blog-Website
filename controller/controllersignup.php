<?php
require_once "../model/signup.php";
if(isset($_POST["signup"]))
{
    $username = $_POST["username"];
    $password = $_POST["password"];
    $passwordhash = password_hash($password,PASSWORD_DEFAULT);
    $email = $_POST["email"];
    $phone = $_POST["phone"];
    // $passworderr = "";
    if(empty($username)||empty($password)||empty($email)||empty($phone))
    {
        echo "please fill all the fields";
    }
    
    elseif(strlen($password)<8)
    {
        echo "Password should be minimum 8 characters";
    }
    elseif(!preg_match("#[A-Z]+#",$password))
    {
        echo "Password must contain 1 uppercase letter";
    }
    elseif(!preg_match("#[a-z]+#",$password))
    {
        echo "Password must contain 1 lowercase letter";
    }
    elseif(!preg_match("#[0-9]+#",$password))
    {
        echo "Password must contain 1 number atleast";
    }
    elseif(!preg_match("/[^a-zA-Z0-9]/",$password))
    {
        echo "Password should contain 1 special character";
    }
    else
    {
    $obj = new signin();
    $existuser = $obj->userexists($username,$email);
    if($existuser)
    {
        echo "Username or Email already exists. Please give another name.";
    }
    else
    {
      $result = $obj->insertuser($username,$passwordhash,$email,$phone);
       if($result)
       {
           echo "Successfully Login Created";
       }
       else
       {
          echo "Error in Inserting";
       }

    }
    }

}
?>