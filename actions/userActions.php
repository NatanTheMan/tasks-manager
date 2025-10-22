<?php

session_start();

require_once __DIR__ . '/../config/connection.php';

function createUser(string $email, string $password): void
{
    $conn = connection();
    $stmt = $conn->prepare('INSERT INTO users (email, password) VALUES (:email, :password);');
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':password', $password);
    $stmt->execute();
    $conn = null;
}

function userExists(string $email): bool
{
    $conn = connection();
    $stmt = $conn->prepare('SELECT user_id FROM users WHERE email=:email');
    $stmt->bindParam(':email', $email);
    $stmt->execute();
    $conn = null;
    return boolval($stmt->fetch());
}

function getOneUser(string $email): object
{
    $conn = connection();
    $stmt = $conn->prepare('SELECT user_id, password FROM users WHERE email=:email;');
    $stmt->bindParam(':email', $email);
    $stmt->execute();
    $conn = null;
    return $stmt->fetch(PDO::FETCH_OBJ);
}
