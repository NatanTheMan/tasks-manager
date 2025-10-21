<?php

require_once __DIR__ . '/../config/connection.php';
require_once __DIR__ . '/../includes/functions.php';

function createTask(string $description, string $urgency, int $userID): void
{
    $conn = connection();
    $stmt = $conn->prepare("INSERT INTO tasks (description, urgency, user_id) VALUES (:description, :urgency, :id);");
    $stmt->bindParam(":description", $description);
    $stmt->bindParam(":urgency", $urgency);
    $stmt->bindParam(":id", $userID);
    $stmt->execute();
    $conn = null;
}

function deleteTask(int $id): void
{
    $conn = connection();
    $stmt =  $conn->prepare("DELETE FROM tasks WHERE task_id=:id");
    $stmt->bindParam(':id', $id);
    $stmt->execute();
    $conn = null;
}

function doneTask(int $id): void
{
    $conn = connection();
    $stmt =  $conn->prepare("UPDATE tasks SET done=1 WHERE task_id=:id");
    $stmt->bindParam(':id', $id);
    $stmt->execute();
}

function getAllTasks(int $userId): array
{
    $conn = connection();
    $stmt = $conn->prepare("SELECT task_id, description, done, urgency FROM tasks WHERE user_id=:id;");
    $stmt->bindParam(':id', $userId);
    $stmt->execute();
    $tasks =  $stmt->fetchAll();
    $conn = null;
    return $tasks;
}

function getOneTask(int $id): array
{
    $conn = connection();
    $stmt = $conn->prepare('SELECT * FROM tasks WHERE task_id=:id');
    $stmt->bindParam(':id', $id);
    $stmt->execute();
    $conn = null;
    return $stmt->fetch();
}

function undone(int $id): void
{
    $conn = connection();
    $stmt =  $conn->prepare("UPDATE tasks SET done=0 WHERE task_id=:id");
    $stmt->bindParam(':id', $id);
    $stmt->execute();
    $conn = null;
}

function updateTask(int $id, string $description, string $urgency): void
{
    $conn = connection();
    $stmt = $conn->prepare('UPDATE tasks SET description=:description, urgency=:urgency WHERE task_id=:id;');
    $stmt->bindParam(':description', $description);
    $stmt->bindParam(':urgency', $urgency);
    $stmt->bindParam(':id', $id);
    $stmt->execute();
    $conn = null;
}
