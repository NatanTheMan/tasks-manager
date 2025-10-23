<!-- session_start(); -->

<!DOCTYPE html>
<html lang='pt-br'>
 <head>
   <meta charset='UTF-8'>
   <meta name='viewport' content='width=device-width, initial-scale=1'>
   <title>Login</title>
 </head>
 <body>
  <h1>Login</h1> 
    <form  action="../actions/login.php" method="post">
    <label for="email">Email</label><br>
    <input type="email" id="email" name="email"><br>
    <label for="password">Password</label><br>
    <input type="password" id="password" name="password"><br>

    <button type="submit">Entrar</button><br>

    <a href="./register.php">Criar conta</a>
    </form>

    <!-- <?php if (isset($_SESSION['error']) && !is_null($_SESSION['error'])) : ?> -->
    <!--   <p style="color: #f33;"><?= $_SESSION['error'] ?></p> -->
    <!--     <?php unset($_SESSION['error']) ?> -->
    <!-- <?php endif ?> -->

 </body>
</html>
