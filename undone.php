<?php

require 'connection.php';

if (isset($_POST['id'])) {
    $conn = connection();
    $stmt =  $conn->prepare("UPDATE tasks SET done=0 WHERE id=:id");
    $stmt->bindParam(':id', $_POST['id']);
    $stmt->execute();
}
header('Location: index.php');
exit();
