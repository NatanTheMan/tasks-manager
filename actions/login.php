<?php

session_start();

require_once __DIR__ . '/userActions.php';
require_once '../includes/functions.php';

$email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL, FILTER_SANITIZE_EMAIL);
$password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_SPECIAL_CHARS);

if (!userExists($email)) {
    echo 'User não encontrado';
    exit;
}

$user = getOneUser($email);

if (password_verify($password, $user->password)) {
    $_SESSION['user_id'] = $user->user_id;
    redirect('../../views/home.php');
} else {
    echo '<p>Senha ou usuario incorretos</p><br>';
    echo "<a href='../views/login.php'>Voltar</a>";
}
