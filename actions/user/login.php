<?php

session_start();

$email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL, FILTER_SANITIZE_EMAIL);
$password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_FULL_SPECIAL_CHARS);

if (!userExists($email)) {
    header('Location: ../../views/login.php');
    exit;
}

$user = getOne($email);

if (password_verify($password, $user['password'])) {
    $_SESSION['user'] = $user['id'];
    header('Location: ../../views/home.php');
    exit;
}
