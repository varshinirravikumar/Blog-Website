<?php

$servername = getenv("DB_HOST") ?: "localhost";
$port       = getenv("DB_PORT") ?: "3307";
$dbname     = getenv("DB_NAME") ?: "Blog";
$username   = getenv("DB_USERNAME") ?: "root";
$password   = getenv("DB_PASSWORD") ?: "";

try
{
    $con = new PDO(
    "mysql:host=$servername;port=$port;dbname=$dbname",
    $username,
    $password
);
    $con->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
}
catch(PDOException $e)
{
    echo "Error:" .$e->getMessage();
}
?>


