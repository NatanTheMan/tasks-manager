<?php

function findAll($table, $fields = "*", $condition = "")
{
    $conn = connection();
    $query = $conn->query("select $fields from $table $condition");
    return $query->fetchAll();
}
