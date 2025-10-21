<?php

require_once  '../includes/functions.php';
require_once __DIR__ . '/taskActions.php';

$id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
$description = filter_input(INPUT_POST, 'description', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$urgency = filter_input(INPUT_POST, 'urgency', FILTER_SANITIZE_SPECIAL_CHARS);

updateTask($id, $description, $urgency);

redirect('../views/home.php');
