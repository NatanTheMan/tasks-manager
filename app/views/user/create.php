<h1>Criar conta</h1> 
<form action="/user/create" method="post">
  <label for="name">Name</label><br>
  <input type="text" id="name" name="name" ><br>
  <?php echo getFlash("name"); ?><br>
  
  <label for="email">E-mail</label><br>
  <input type="text" id="email" name="email" ><br>
  <?php echo getFlash("email"); ?><br>

  <label for="password">Senha</label><br>
  <input type="password" id="password" name="password" ><br>
  <?php echo getFlash("password"); ?><br>

  <button type="submit">Criar</button><br>

  <a href="/login">Login</a>
</form>
