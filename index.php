<?php

require 'connection.php';
require 'getAll.php';

?>

<!DOCTYPE html>
<html lang='pt-br'>
 <head>
   <meta charset='UTF-8'>
   <meta name='viewport' content='width=device-width, initial-scale=1'>
   <title>Gerenciar Tarefas</title>
 </head>
 <body>
  <h1>Tarefas</h1> 
  <table> 
    <tr> 
      <th></th>
      <th>Tarefa</th>
      <th>Estado</th>
      <th>Urgência</th>
    </tr>
<?php
$color = '';
$tasks = getAll();
foreach ($tasks as $task) {
    [$id, $description, $done, $urgency] = $task;
    $done = $done ? "concluída" : "pendente";

    switch ($urgency) {
        case 'low':
            $color = '#bbb';
            break;
        case 'medium':
            $color = '#d2a';
            break;
        case 'high':
            $color = '#f00';
            break;
        default:
            break;
    }

    echo "<tr>";
    echo "<td>
      <form action='done.php' method='post'>
        <button type='submit' name='id' value='$id'>✅</button>
      </form>
    </td>";
    echo "<td>$description</td>";
    echo "<td>$done</td>";
    echo "<td style='color: $color;'>$urgency</td>";
    echo "<td>✏️</td>";
    echo "<td>
      <form action='delete.php' method='post'>
        <button type='submit' name='id' value='$id'>🗑️</button>
      </form>
    </td></tr>";
}
?>
  </table>

   <button><a href="create.php">+</a></button> 

 </body>
</html>
