<?php

echo "HOST: " . getenv("DB_HOST") . "<br>";
echo "PORT: " . getenv("DB_PORT") . "<br>";
echo "NAME: " . getenv("DB_NAME") . "<br>";
echo "USER: " . getenv("DB_USERNAME") . "<br>";

try {
    $con = new PDO(
        "mysql:host=" . getenv("DB_HOST") .
        ";port=" . getenv("DB_PORT") .
        ";dbname=" . getenv("DB_NAME"),
        getenv("DB_USERNAME"),
        getenv("DB_PASSWORD"),
        [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_TIMEOUT => 10
        ]
    );

    echo "<br><strong>DATABASE CONNECTION SUCCESSFUL</strong>";
}
catch (PDOException $e) {
    echo "<br><strong>DATABASE ERROR:</strong> " . $e->getMessage();
}