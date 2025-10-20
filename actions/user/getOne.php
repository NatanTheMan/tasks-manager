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
