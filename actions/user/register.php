<?php

require_once __DIR__ . '/../../config/connection.php';
session_start();

function create(string $email, string $password): void
{
    try {
        $conn = connection();
        $stmt = $conn->prepare('INSERT INTO users (email, password) VALUES (:email, :password);');
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':password', $password);
        $stmt->execute();
        $conn = null;
        $_SESSION['user'] = $email;
        header('Location: ../../views/home.php');
        exit;
    } catch (PDOException $e) {
        echo '</p>' . $e->getMessage() . '</p>';
    }
}
