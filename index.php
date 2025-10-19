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
      <th>Tarefa</th></th>
      <th>Estado</th>
      <th>Urgência</th>
    </tr>
<?php
$conn = connection();
$stmt = $conn->query('select description, done, urgency from tasks;');
$color = '';
foreach ($stmt->fetchAll() as $task) {
    echo"<tr>" . "<td>" . $task['description'] . "</td>";
    $urgency = $task['done'] == 0 ? "pendendte" : "concluída";
    echo"<td>$urgency</td>";
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
    echo "<td style='color: $color;'>" . $task['urgency'] . "</td></tr>";
}
$conn = null;
?>
  </table>

   <button><a href="create.php">+</a></button> 

 </body>
</html>
