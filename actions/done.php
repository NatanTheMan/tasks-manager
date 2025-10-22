<?php

session_start();

require_once '../includes/functions.php';
require_once __DIR__ . '/taskActions.php';

if (!isset($_SESSION['user_id']) || is_null($_SESSION['user_id'])) {
    redirect('../views/login.php');
}

$id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);

doneTask($id);

redirect('../views/home.php');
