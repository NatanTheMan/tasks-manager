<?php

use app\helpers\Tables;

function update(Tables $table, array $fieldsAndValues, int $id): void
{
    $conn = connection();
    $fields = setFields($fieldsAndValues);
    $stmt = $conn->prepare("UPDATE {$table->value} SET {$fields} WHERE id={$id}");
    $stmt->execute();
}

function setFields(array $fieldAndValues): string
{
    $str = "";
    foreach ($fieldAndValues as $field => $value) {
        $str .= "$field=\"$value\", ";
    }
    return substr($str, 0, -2);
}
