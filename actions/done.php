<?php

require '../config/connection.php';
require '../includes/functions.php';

if (isset($_POST['id'])) {
    $conn = connection();
    $stmt =  $conn->prepare("UPDATE tasks SET done=1 WHERE id=:id");
    $stmt->bindParam(':id', $_POST['id']);
    $stmt->execute();
}
redirect('../views/index.php');
