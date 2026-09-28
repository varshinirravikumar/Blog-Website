<?php
require_once "../model/signin.php";
$error = " ";
if (isset($_POST["signin"])) {
    $username = $_POST["username"];
    $password = $_POST["password"];

    $obj = new select();
    $result = $obj->selectuser($username);
    if($result)
        {
            $passwordhash = $result["password"];
    
            $passwordverify = password_verify($password, $passwordhash);
    
            if($passwordverify)
            {
            session_start();

            $_SESSION["username"] = $username;
            $_SESSION["id"] = $result["id"];
            $_SESSION["email_id"] = $result["email_id"];
            $_SESSION["phone_no"] = $result["phone_no"];
            header("Location: ../view/blog.php");
            exit();
            }
            else
            {
                $error = "Incorrect password";
            }





    } else {
        $error = "Username not found";
    }


}

?>