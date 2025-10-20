<?php

require_once __DIR__ . '/../config/connection.php';

function getOne(int $id)
{
    $conn = connection();
    $stmt = $conn->prepare('SELECT * FROM tasks WHERE id=:id');
    $stmt->bindParam(':id', $id);
    $stmt->execute();
    $conn = null;
    return $stmt->fetch();
}
