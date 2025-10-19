<?php

require '../config/connection.php';
require '../includes/functions.php';

$urgency = filter_input(INPUT_POST, 'urgency');
$description = filter_input(INPUT_POST, 'description', FILTER_SANITIZE_FULL_SPECIAL_CHARS);

if ($description !== '' && !is_null($description)) {
    $conn = connection();
    $stmt = $conn->prepare("INSERT INTO tasks (description, urgency) VALUES (:description, :urgency);");
    $stmt->bindParam(":description", $description);
    $stmt->bindParam(":urgency", $urgency);
    $stmt->execute();
    $conn = null;
    redirect('../views/index.php');
}
