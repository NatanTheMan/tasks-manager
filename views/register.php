<!DOCTYPE html>
<html lang='pt-br'>
 <head>
   <meta charset='UTF-8'>
   <meta name='viewport' content='width=device-width, initial-scale=1'>
   <title>Criar conta</title>
 </head>
 <body>
  <h1>Criar conta</h1> 
    <form action="../actions/register.php" method="post">
      <label for="email">E-mail</label><br>
      <input type="email" id="email" name="email" ><br>
      <label for="password">Senha</label><br>
      <input type="password" id="password" name="password" ><br>

      <button type="submit">Criar</button><br>

      <a href="./login.php">Login</a>
    </form>
 </body>
</html>
