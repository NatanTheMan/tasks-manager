<?php

session_start();

require './getOne.php';

$email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL, FILTER_SANITIZE_EMAIL);
$password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_SPECIAL_CHARS);

if (!userExists($email)) {
    header('Location: ../../views/register.php');
    exit;
}

$user = getOne($email);

if (password_verify($password, $user['password'])) {
    $_SESSION['user'] = $user['id'];
    header('Location: ../../views/home.php');
    exit;
} else {
    echo 'Senha ou usuario incorretos';
}
