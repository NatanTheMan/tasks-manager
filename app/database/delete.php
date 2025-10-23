<?php

function delete(string $table, int $id): void
{
    $conn = connection();
    $stmt = $conn->prepare("DELETE FROM :table WHERE id=:id");
    $stmt->bindParam(':table', $table);
    $stmt->bindParam(':id', $id);
    $stmt->execute();
}
