<?php

require 'connection.php';

function getOne(int $id)
{
    $conn = connection();
    $stmt = $conn->prepare('select * from tasks where id=:id');
    $stmt->bindParam(':id', $id);
    $stmt->execute();
    $conn = null;
    return $stmt->fetch();
}
