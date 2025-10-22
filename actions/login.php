<?php

session_start();

require_once __DIR__ . '/userActions.php';
require_once '../includes/functions.php';

if (!isset($_SESSION['user_id']) || is_null($_SESSION['user_id'])) {
    redirect('../views/login.php');
}

$email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL, FILTER_SANITIZE_EMAIL);
$password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_SPECIAL_CHARS);

if (!userExists($email)) {
    $_SESSION['error'] = "User não encontrado";
    redirect('../views/login.php');
}

$user = getOneUser($email);

if (password_verify($password, $user->password)) {
    $_SESSION['user_id'] = $user->user_id;
    redirect('../../views/home.php');
} else {
    $_SESSION['error'] = "Senha ou usuario incorretos";
    redirect('../views/login.php');
}
