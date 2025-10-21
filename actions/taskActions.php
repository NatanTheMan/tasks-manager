<?php

require_once __DIR__ . '/../config/connection.php';
require_once __DIR__ . '/../includes/functions.php';

function createTask(string $description, string $urgency): void
{
    $conn = connection();
    $stmt = $conn->prepare("INSERT INTO tasks (description, urgency) VALUES (:description, :urgency);");
    $stmt->bindParam(":description", $description);
    $stmt->bindParam(":urgency", $urgency);
    $stmt->execute();
    $conn = null;
}

function deleteTask(int $id): void
{
    $conn = connection();
    $stmt =  $conn->prepare("DELETE FROM tasks WHERE id=:id");
    $stmt->bindParam(':id', $id);
    $stmt->execute();
    $conn = null;
}

function doneTask(int $id): void
{
    $conn = connection();
    $stmt =  $conn->prepare("UPDATE tasks SET done=1 WHERE id=:id");
    $stmt->bindParam(':id', $id);
    $stmt->execute();
}

function getAllTasks(): array
{
    $conn = connection();
    $stmt = $conn->query('SELECT id, description, done, urgency FROM tasks;');
    $tasks =  $stmt->fetchAll();
    $conn = null;
    return $tasks;
}

function getOneTask(int $id): array
{
    $conn = connection();
    $stmt = $conn->prepare('SELECT * FROM tasks WHERE id=:id');
    $stmt->bindParam(':id', $id);
    $stmt->execute();
    $conn = null;
    return $stmt->fetch();
}

function undone(int $id): void
{
    $conn = connection();
    $stmt =  $conn->prepare("UPDATE tasks SET done=0 WHERE id=:id");
    $stmt->bindParam(':id', $id);
    $stmt->execute();
    $conn = null;
}

function updateTask(int $id, string $description, string $urgency): void
{
    $conn = connection();
    $stmt = $conn->prepare('UPDATE tasks SET description=:description, urgency=:urgency WHERE id=:id;');
    $stmt->bindParam(':id', $id);
    $stmt->bindParam(':description', $description);
    $stmt->bindParam(':urgency', $urgency);
    $stmt->execute();
    $conn = null;
}
