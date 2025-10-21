<?php

require_once '../includes/functions.php';
require_once __DIR__ . '/taskActions.php';

var_dump($_GET);
$id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
var_dump($id);

doneTask($id);

redirect('../views/home.php');
