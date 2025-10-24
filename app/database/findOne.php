<?php

use app\database\Tables;

function findById(Tables $table, int $id, $fields = "*")
{
    $conn = connection();
    $query = $conn->query("SELECT $fields FROM $table WHERE id=$id");
    return  $query->fetch() ;
}

function findByEmail(string $email, $fields = "*")
{
    $conn = connection();
    $query = $conn->query("SELECT $fields FROM users WHERE email=$email");
    return $query->fetch();
}
