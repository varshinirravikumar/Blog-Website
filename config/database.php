<?php

$servername = "localhost";
$dbname     = "Blog";
$username   =  "root";
$password   = "";

// $servername = "sql111.infinityfree.com";
// $dbname     = "if0_43059138_Blog";
// $username   =  "if0_43059138";
// $password   = "80560070";


try
{
    $con = new PDO("mysql:host=$servername;dbname=$dbname",$username,$password);
    $con->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
}
catch(PDOException $e)
{
    echo "Error:" .$e->getMessage();
}
?>


