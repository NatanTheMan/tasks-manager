<?php

function getAll(): array
{
    $conn = connection();
    $stmt = $conn->query('select id, description, done, urgency from tasks;');
    return $stmt->fetchAll();
}
