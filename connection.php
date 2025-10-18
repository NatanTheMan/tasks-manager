<?php

function loadEnv(string $path): void
{

    if (!file_exists($path)) {
        return;
    }
    $vars = parse_ini_file($path);
    foreach ($vars as $key => $value) {
        putenv("$key=$value");
        $_ENV[$key] = $value;
    }
}

function connection(): PDO
{
    loadEnv(__DIR__ . "/.env");
    $host = getenv("DB_HOST");
    $database = getenv("DB_DATABASE");
    $user = getenv("DB_USER");
    $password = getenv("DB_PASSWORD");

    $conn = new PDO("mysql:host=$host;dbname=$database", $user, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    return $conn;
}
