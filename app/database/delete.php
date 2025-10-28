<?php

use app\helpers\Tables;

function delete(Tables $table, int $id): void
{
    $conn = connection();
    $stmt = $conn->prepare("DELETE FROM {$table->value} WHERE id={$id}");
    $stmt->execute();
}
