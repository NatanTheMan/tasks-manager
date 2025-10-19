<?php

require 'connection.php';

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
$conn = connection();
$stmt = $conn->query('select * from tasks;');
$color = '';
foreach ($stmt->fetchAll() as $task) {
    switch ($task['urgency']) {
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
    $urgency = $task['done'] == 0 ? "pendendte" : "concluída";

    echo "<tr>";
    echo "<td><form action='done.php' method='post'><button type='submit' name='id' value='" . $task['id'] . "'>✅</button></form></td>";
    echo "<td>" . $task['description'] . "</td>";
    echo "<td>$urgency</td>";
    echo "<td style='color: $color;'>" . $task['urgency'] . "</td>";
    echo "<td>✏️</td>";
    echo "<td>🗑️</td></tr>";
}
$conn = null;
?>
  </table>

   <button><a href="create.php">+</a></button> 

 </body>
</html>
