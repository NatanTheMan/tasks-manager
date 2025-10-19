<?php

function getAll(): array
{
    $conn = connection();
    $stmt = $conn->query('SELECT id, description, done, urgency FROM tasks;');
    $tasks =  $stmt->fetchAll();
    $conn = null;
    return $tasks;
}
