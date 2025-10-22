<?php

session_start();

require_once  '../includes/functions.php';
require_once __DIR__ . '/taskActions.php';

if (!isset($_SESSION['user_id']) || is_null($_SESSION['user_id'])) {
    redirect('../views/login.php');
}

$id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
$description = filter_input(INPUT_POST, 'description', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$urgency = filter_input(INPUT_POST, 'urgency', FILTER_SANITIZE_SPECIAL_CHARS);

updateTask($id, $description, $urgency);

redirect('../views/home.php');
