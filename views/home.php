<?php

require '../includes/header.php';
require_once '../includes/functions.php';
require_once '../actions/taskActions.php';

session_start();

if (!isset($_SESSION['user'])) {
    redirect('./login.php');
}

$tasks = getAllTasks();

?>

<!DOCTYPE html>
<html lang='pt-br'>
 <head>
   <meta charset='UTF-8'>
   <meta name='viewport' content='width=device-width, initial-scale=1'>
   <title>Gerenciar Tarefas</title>
 </head>
 <body>
  <?php generateHeader(); ?>
  <h1>Tarefas</h1> 
  <table> 
    <tr> 
      <th></th>
      <th>Tarefa</th>
      <th>Estado</th>
      <th>Urgência</th>
    </tr>
    <?php foreach ($tasks as [$id, $description, $done, $urgency]) : ?>
      <tr>
        <?php if ($done) : ?>
        <td>
          <form action='../actions/undone.php?id=<?= $id ?>' method='post'>
            <button type='submit'>❌</button>
          </form>
        </td>
        <?php else : ?>
        <td>
          <form action='../actions/done.php?id=<?= $id ?>' method='post'>
            <button type='submit'>✅</button>
          </form>
        </td>
        <?php endif ?>
        <td><?= $description ?></td>
        <td><?= $done ? "concluída" : "pendente" ?></td>
        <td style="color: <?= defineColor($urgency) ?>;"><?= $urgency ?></td>
        <td>
          <form action='../views/form_edit.php?id=<?= $id ?>' method='post'>
            <button type='submit'>✏️</button>
          </form>
        </td>
        <td>
          <form action='../actions/delete.php?id=<?= $id?>' method='post'>
            <button type='submit'>🗑️</button>
          </form>
        </td>
      </tr>
    <?php endforeach; ?>
  </table>

   <button><a  href="../views/form_create.php">+</a></button> 

 </body>
</html>

<?php

function defineColor(string $urgency): string
{
    switch ($urgency) {
        case 'low':
            return '#bbb';
            break;
        case 'medium':
            return '#d2a';
            break;
        case 'high':
            return '#f00';
            break;
        default:
            return '';
            break;
    }
}
