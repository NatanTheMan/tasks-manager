<?php

session_start();
require_once './includes/functions.php';

isset($_SESSION['user']) ? redirect('./views/home.php') : redirect('./views/login.php');
