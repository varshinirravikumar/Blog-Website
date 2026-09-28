<?php

$servername ="localhost";
$dbname ="Blog";
$username ="root";
$password ="";

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


