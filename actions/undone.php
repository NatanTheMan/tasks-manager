<?php

require_once '../includes/functions.php';
require_once __DIR__ . '/taskActions.php';

$id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);

undone($id);

redirect('../views/home.php');
