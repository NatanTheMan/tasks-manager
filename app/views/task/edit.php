<!DOCTYPE html>
<html lang='pt-br'>
 <head>
   <meta charset='UTF-8'>
   <meta name='viewport' content='width=device-width, initial-scale=1'>
   <title>Atualizar tarefa</title>
 </head>
 <body>
  <?php require VIEWS . 'header.php'; ?>
  <h1>Atualizar tarefa</h1> 
    <form action="../actions/update.php?id=<?= $id ?>" method="post">
      <label for="description">Tarefa: </label>
      <input type='text' name='description' id='description' value='<?= $task->description ?>'>

      <select name='urgency'>
        <?php if ($task->urgency === 'low') : ?>
          <option value='low' selected>Baixa</option>
        <?php else : ?>
          <option value='low'>Baixa</option>
        <?php endif ?>

        <?php if ($task->urgency === 'medium') : ?>
          <option value='medium' selected>Média</option>
        <?php else : ?>
          <option value='medium'>Média</option>
        <?php endif ?>

        <?php if ($task->urgency === 'high') : ?>
          <option value='high' selected>Alta</option>
        <?php else : ?>
          <option value='high'>Alta</option>
        <?php endif ?>
      </select>

      <button type='submit'>Editar</button>
    </form>
 </body>
</html>
<?php

  // session_start();
  //
  // require '../includes/header.php';
  // require '../actions/taskActions.php';
  //
  // if (!isset($_SESSION['user_id']) || is_null($_SESSION['user_id'])) {
  //     redirect('./login.php');
  // }
  //
  // $id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
  //
  // $task = getOneTask($id);
