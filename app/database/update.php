<?php

use app\database\Tables;
use app\helpers\TaskFields;

function update(Tables $table, array $fieldsAndValues, int $id): void
{
    $conn = connection();
    $stmt = $conn->prepare("UPDATE :table SET :fields WHERE id=:id");
    $stmt->bindParam(':table', $table);
    $stmt->bindParam(':fields', setFields($fieldsAndValues));
    $stmt->bindParam(':id', $id);
    $stmt->execute();
}

function setFields(array $fieldAndValues): string
{
    $str = "";
    foreach ($fieldAndValues as $field => $value) {
        $str .= "$field=$value, ";
    }
    return substr($str, 0, -2);
}
