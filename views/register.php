<?php

session_start();

require '../actions/user/register.php';
require '../actions/user/getOne.php';

$email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
$password = password_hash(filter_input(INPUT_POST, 'password', FILTER_SANITIZE_FULL_SPECIAL_CHARS), PASSWORD_ARGON2ID);


if ($email != '' && $password != '') {
    if (userExists($email)) {
        echo 'Email já cadastrado';
        exit;
    }
    create($email, $password);
    $_SESSION['user'] = $email;
    header('Location: ../views/index.php');
}

?>
<!DOCTYPE html>
<html lang='pt-br'>
 <head>
   <meta charset='UTF-8'>
   <meta name='viewport' content='width=device-width, initial-scale=1'>
   <title>Criar conta</title>
 </head>
 <body>
  <h1>Criar conta</h1> 
    <form action="" method="post">
      <label for="email">E-mail</label><br>
      <input type="email" id="email" name="email" ><br>
      <label for="password">Senha</label><br>
      <input type="password" id="password" name="password" ><br>

      <button type="submit">Criar</button>
    </form>
 </body>
</html>
