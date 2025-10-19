<?php

function connection(): PDO
{
    $vars = parse_ini_file(__DIR__ . "/../.env");
    foreach ($vars as $key => $value) {
        putenv("$key=$value");
        $_ENV[$key] = $value;
    }

    $host = getenv("DB_HOST");
    $database = getenv("DB_DATABASE");
    $user = getenv("DB_USER");
    $password = getenv("DB_PASSWORD");

    $conn = new PDO("mysql:host=$host;dbname=$database", $user, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    return $conn;
}
