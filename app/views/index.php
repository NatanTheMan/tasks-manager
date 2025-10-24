<!DOCTYPE html>
<html lang='pt-br'>
 <head>
   <meta charset='UTF-8'>
   <meta name='viewport' content='width=device-width, initial-scale=1'>
    <title><?= $title ?></title>
 </head>
 <body>
  <header style="display: flex; justify-content: space-between; margin-bottom: 50px;">
    <h3 style="margin-left: 40px;"><a href="/">Gerenciador de Tarefas</a></h3> 

    <nav style="margin-right: 60px;">
      <a href="../views/form_create.php">Adicionar</a> 
      <a href="../actions/logout.php">Sair ➡️</a> 
    </nav>
  </header>

  <?php require $view; ?>

 </body>
</html>
