<?php

session_start();

require '../includes/functions.php';

unset($_SESSION['user_id']);
redirect('../../views/login.php');
