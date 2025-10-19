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
<?php
$conn = connection();
$stmt = $conn->query('select description, done, urgency from tasks;');
$color = '';
foreach ($stmt->fetchAll() as $task) {
    echo "<div>";
    echo $task['description'];
    echo $task['done'] == 0 ? "pendendte" : "concluída";
    switch ($task['urgency']) {
        case 'baixa':
            $color = 'gray';
            break;
        case 'média':
            $color = 'yellow';
            break;
        case 'alta':
            $color = 'red';
            break;
        default:
            break;
    }
    echo "<span style='color: $color;'>" . $task['urgnecy'] . "</span>";
    echo "</div>";
}
?>

 </body>
</html>
