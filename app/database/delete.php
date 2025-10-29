<?php

function delete($table, int $id)
{
    $conn = connection();
    $stmt = $conn->prepare("DELETE FROM $table WHERE id=:id");
    $stmt->bindParam(":id", $id);
    $stmt->execute();
}
