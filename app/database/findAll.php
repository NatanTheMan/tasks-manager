<?php

use app\helpers\Tables;

function findAll(Tables $table, $fields = "*", $condition = "")
{
    $conn = connection();
    $query = $conn->query("SELECT {$fields} FROM {$table->value} {$condition}");
    return $query->fetchAll();
}
