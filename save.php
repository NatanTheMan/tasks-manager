<?php

function save(string $description, string $urgency): void
{
    $conn = connection();
    $stmt = $conn->prepare("INSERT INTO tasks (description, urgency) VALUES (:description, :urgency);");
    $stmt->bindParam(":description", $description);
    $stmt->bindParam(":urgency", $urgency);
    $stmt->execute();
    $conn = null;
}
