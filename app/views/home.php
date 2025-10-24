<?php

$colorSettings = ["low" => "#bbb", "medium" => "#d2a", "high" => "#f00"];

?>

  <h1>Tarefas</h1> 
  <table> 
    <tr> 
      <th></th>
      <th>Tarefa</th>
      <th>Estado</th>
      <th>Urgência</th>
    </tr>
    <?php foreach ($tasks as $task) : ?>
      <tr>
        <?php if ($task->done) : ?>
        <td>
          <form action='../actions/undone.php?id=<?= $task->id ?>' method='post'>
            <button type='submit'>❌</button>
          </form>
        </td>
        <?php else : ?>
        <td>
          <form action='../actions/done.php?id=<?= $task->id ?>' method='post'>
            <button type='submit'>✅</button>
          </form>
        </td>
        <?php endif ?>
        <td><?= $task->description ?></td>
        <td><?= $task->done ? "concluída" : "pendente" ?></td>

        <td style="color: <?= $colorSettings[$task->urgency] ?>;"><?= $task->urgency ?></td>

        <td>
          <form action='task/<?= $task->id ?>/edit' method='get'>
            <button type='submit'>✏️</button>
          </form>
        </td>
        <td>
          <form action='../actions/delete.php?id=<?= $task->id?>' method='post'>
            <button type='submit'>🗑️</button>
          </form>
        </td>
      </tr>
    <?php endforeach; ?>
  </table>

   <button><a  href="../views/form_create.php">+</a></button> 
