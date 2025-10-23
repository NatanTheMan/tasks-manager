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

function getOneUser(string $email)
{
    $conn = connection();
    $stmt = $conn->prepare('SELECT user_id, password FROM users WHERE email=:email;');
    $stmt->bindParam(':email', $email);
    $stmt->execute();
    $conn = null;
    if ($stmt->fetch(PDO::FETCH_OBJ) == false) {
        return null;
    }
    return $stmt->fetch(PDO::FETCH_OBJ);
}
