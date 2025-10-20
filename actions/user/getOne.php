<?php

require_once __DIR__ .  '/../../config/connection.php';

function userExists(string $email): bool
{
    $conn = connection();
    $stmt = $conn->prepare('SELECT id FROM users WHERE email=:email;');
    $stmt->bindParam(':email', $email);
    $stmt->execute();
    $conn = null;

    return $stmt->fetch() > 0;
}

function getOne(string $email): array
{
    $conn = connection();
    $stmt = $conn->prepare('SELECT id, password FROM users WHERE email=:email;');
    $stmt->bindParam(':email', $email);
    $stmt->execute();
    $conn = null;
    return  $stmt->fetch();
}
