<?php

session_start();

require_once './userActions.php';
require_once '../includes/functions.php';

$email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
$password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_FULL_SPECIAL_CHARS) ;


if ($email == '' || $password == '') {
    echo 'Email e Senha são obrigatórios.';
}

if (userExists($email)) {
    echo 'Usuário já cadastrado';
    exit;
}

createUser($email, password_hash($password, PASSWORD_ARGON2I));
$_SESSION['user_id'] = getOneUser($email)['user_id'];
redirect('../views/home.php');
