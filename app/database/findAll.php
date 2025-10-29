<?php

function findAll($table, $fields = "*", $condition = "")
{
    $conn = connection();
    $stmt = $conn->query("SELECT $fields FROM $table $condition");
    $stmt->execute();
    return $stmt->fetchAll();
}
