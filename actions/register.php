<?php

session_start();

require_once './userActions.php';
require_once '../includes/functions.php';

if (!isset($_SESSION['user_id']) || is_null($_SESSION['user_id'])) {
    redirect('../views/login.php');
}

$email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
$password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_FULL_SPECIAL_CHARS) ;


if ($email == '' || $password == '') {
    $_SESSION['error'] = 'Email e Senha são obrigatórios.';
    redirect('../views/register.php');
}

if (userExists($email)) {
    $_SESSION['error'] = 'Usuário já cadastrado';
    redirect('../views/register.php');
}

createUser($email, password_hash($password, PASSWORD_ARGON2I));
$_SESSION['user_id'] = getOneUser($email)['user_id'];
redirect('../views/home.php');
