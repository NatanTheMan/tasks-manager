<?php

function findBy($table, $field, $value)
{
    $conn = connection();
    $stmt = $conn->prepare("SELECT * FROM $table WHERE $field=:value");
    $stmt->bindParam(":value", $value);
    $stmt->execute();
    return $stmt->fetch();
}
