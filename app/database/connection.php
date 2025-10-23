<?php

function connection(): PDO
{
    $vars = parse_ini_file(ROOT . "/.env");
    foreach ($vars as $key => $value) {
        putenv("$key=$value");
        $_ENV[$key] = $value;
    }

    $host = getenv("DB_HOST");
    $database = getenv("DB_DATABASE");
    $user = getenv("DB_USER");
    $password = getenv("DB_PASSWORD");

    return new PDO("mysql:host=$host;dbname=$database", $user, $password, [
          PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ
        ]);
}
