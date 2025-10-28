<?php

function createTask(string $description, string $urgency, int $userId): void
{
    $conn = connection();
    $query = $conn->prepare("INSERT INTO tasks (description, urgency, user_id) VALUES (:description, :urgency, :user_id);");
    $query->bindParam(":description", $description);
    $query->bindParam(":urgency", $urgency);
    $query->bindParam(":user_id", $userId);
    $query->execute();
}
