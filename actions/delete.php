<?php

require '../config/connection.php';
require '../includes/functions.php';

if (isset($_POST['id'])) {
    $conn = connection();
    $stmt =  $conn->prepare("DELETE FROM tasks WHERE id=:id");
    $stmt->bindParam(':id', $_POST['id']);
    $stmt->execute();
    $conn = null;
}
redirect('../views/index.php');
