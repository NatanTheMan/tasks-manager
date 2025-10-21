<?php

session_start();

require'../includes/header.php';
require'../actions/taskActions.php';

$urgency = filter_input(INPUT_POST, 'urgency', FILTER_SANITIZE_SPECIAL_CHARS);
$description = filter_input(INPUT_POST, 'description', FILTER_SANITIZE_FULL_SPECIAL_CHARS);

if ($description != '' && !is_null($description)) {
    createTask($description, $urgency, $_SESSION['user_id']);
    redirect('../views/home.php');
}

?>

<!DOCTYPE html>
<html lang='pt-br'>
 <head>
   <meta charset='UTF-8'>
   <meta name='viewport' content='width=device-width, initial-scale=1'>
   <title>Criar tarefa</title>
 </head>
 <body>
<?php  generateHeader();?>
  <h1>Criar tarefa</h1> 
    <form action="" method="post">
      <label for="description">Tarefa: </label>
      <input type="text" name="description" id="description">
      <select name="urgency">
        <option value="low" selected>Baixa</option>
        <option value="medium">Média</option>
        <option value="high">Alta</option>
      </select>

      <button>Adicionar</button>
    </form>
 </body>
</html>
