<?php

session_start();

require_once '../includes/functions.php';
require_once __DIR__ . '/userActions.php';

$password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_SPECIAL_CHARS);
$email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL, FILTER_SANITIZE_EMAIL);

$user = getOneUser($email);
var_dump($user);
if (is_null($user)) {
    $_SESSION['error'] = "User não encontrado";
    redirect('../views/login.php');
}

if (password_verify($password, $user->password)) {
    $_SESSION['user_id'] = $user->user_id;
    redirect('../../views/home.php');
} else {
    $_SESSION['error'] = "Senha ou usuario incorretos";
    redirect('../views/login.php');
}
