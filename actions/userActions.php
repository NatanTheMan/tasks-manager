<?php

require_once __DIR__ . '/../config/connection.php';

session_start();

function createUser(string $email, string $password): void
{
    $conn = connection();
    $stmt = $conn->prepare('SELECT id FROM users WHERE email=:email;');
    $stmt->bindParam(':email', $email);
    $stmt->execute();
    if ($stmt->fetch()) {
        throw new Exception('Usuário já cadastrado');
    }

    $stmt = $conn->prepare('INSERT INTO users (email, password) VALUES (:email, :password);');
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':password', $password);
    $stmt->execute();
    $conn = null;
}

function getOneUser(string $email): array
{
    $conn = connection();
    $stmt = $conn->prepare('SELECT id, password FROM users WHERE email=:email;');
    $stmt->bindParam(':email', $email);
    $stmt->execute();
    $conn = null;
    $result = $stmt->fetch();
    if ($result == false) {
        throw new Exception('Usuário não encontrado');
    }
    return $result;
}
