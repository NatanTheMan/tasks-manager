<?php

use app\database\Tables;

function create(Tables $table, array $fields, array $values): void
{
    $conn = connection();
    $query = $conn->prepare("INSERT INTO :table (:fields) VALUES (:values);");
    $query->bindParam(":table", $table);
    $query->bindParam(":fields", substr(join(", ", $fields), 0, -2));
    $query->bindParam(":values", substr(join(', ', $values), 0, -2));
    $query->execute();
}
