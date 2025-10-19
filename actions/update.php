<?php

require '../config/connection.php';
require '../includes/functions.php';

$id = filter_input(INPUT_POST, 'id', FILTER_VALIDATE_INT);
$description = filter_input(INPUT_POST, 'description', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$urgency = filter_input(INPUT_POST, 'urgency', FILTER_SANITIZE_SPECIAL_CHARS);

$conn = connection();
$stmt = $conn->prepare('UPDATE tasks SET description=:description, urgency=:urgency WHERE id=:id;');
$stmt->bindParam(':id', $id);
$stmt->bindParam(':description', $description);
$stmt->bindParam(':urgency', $urgency);
$stmt->execute();
$conn = null;

redirect('../views/index.php');
