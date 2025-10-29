<?php

function editTask($description, $urgency, $id)
{
    $conn = connection();
    $stmt = $conn->prepare("UPDATE tasks SET description=:description, urgency=:urgency WHERE id=:id");
    $stmt->bindParam(":description", $description);
    $stmt->bindParam(":urgency", $urgency);
    $stmt->bindParam(":id", $id);
    $stmt->execute();
}

function editStatus($status, $id)
{
    $conn = connection();
    $stmt = $conn->prepare("UPDATE tasks SET done=:status WHERE id=:id");
    $stmt->bindParam(":status", $status);
    $stmt->bindParam(":id", $id);
    $stmt->execute();
}
