<?php

session_start();

require_once './userActions.php';
require_once '../includes/functions.php';

$email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
$password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_FULL_SPECIAL_CHARS) ;

if ($email == '' || $password == '') {
    $_SESSION['error'] = 'Email e Senha são obrigatórios.';
    redirect('../views/register.php');
}

$user = getOneUser($email);
if (!is_null($user)) {
    $_SESSION['error'] = 'Usuário já cadastrado';
    redirect('../views/register.php');
}

createUser($email, password_hash($password, PASSWORD_ARGON2I));
$user = getOneUser($email);
$_SESSION['error'] = "$user error ";
$_SESSION['user_id'] = getOneUser($email)->user_id;
redirect('../views/home.php');
