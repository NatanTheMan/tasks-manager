<?php

require 'connection.php';
require 'save.php';

$urgency = filter_input(INPUT_POST, 'urgency');
$description = filter_input(INPUT_POST, 'description', FILTER_SANITIZE_FULL_SPECIAL_CHARS);

if ($description !== '' && !is_null($description)) {
    save($description, $urgency);
    header('Location: index.php');
    exit();
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
  <h1>Criar tarefa</h1> 
    <form action="" method="post">
      <label for="description">Tarefa: </label>
      <input type="text" name="description" id="description">
      <select name="urgency">
        <option value="low">Baixa</option>
        <option value="medium">Média</option>
        <option value="high">Alta</option>
      </select>

      <button>Adicionar</button>
    </form>
 </body>
</html>
