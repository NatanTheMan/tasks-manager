<h1>Login</h1> 
<form  action="/login" method="post">
<label for="email">Email</label><br>
<input type="email" id="email" name="email"><br>
<label for="password">Password</label><br>
<input type="password" id="password" name="password"><br>

<button type="submit">Entrar</button><br>

<a href="/user/create">Criar conta</a>
</form>

<?php echo getFlash("message");
