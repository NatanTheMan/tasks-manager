<?php

function createTask(string $description, string $urgency, int $userId): void
{
    $conn = connection();
    $stmt = $conn->prepare("INSERT INTO tasks (description, urgency, user_id) VALUES (:description, :urgency, :user_id);");
    $stmt->bindParam(":description", $description);
    $stmt->bindParam(":urgency", $urgency);
    $stmt->bindParam(":user_id", $userId);
    $stmt->execute();
}

function createUser(string $name, string $email, string $password): void
{
    $conn = connection();
    $stmt = $conn->prepare("INSERT INTO users (name, email, password) VALUES (:name, :email, :password);");
    $stmt->bindParam(":name", $name);
    $stmt->bindParam(":email", $email);
    $stmt->bindParam(":password", $password);
    $stmt->execute();
}
