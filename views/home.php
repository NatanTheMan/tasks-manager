<?php
if (!isset($_SESSION['user'])) {
    header('Location: ./login.php');
    exit;
}
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

require '../actions/getAll.php';

$tasks = getAll();
foreach ($tasks as [$id, $description, $done, $urgency]) {
    $status = $done;
    $done = $done ? "concluída" : "pendente";
    $color = defineColor($urgency);

    echo "<tr>";
    statusChangeBtn($status, $id);
    echo "<td>$description</td>";
    echo "<td>$done</td>";
    echo "<td style='color: $color;'>$urgency</td>";
    editBtn($id);
    deleteBtn($id);
    echo "</tr>";
}
?>
  </table>

   <button><a href="../views/form_create.php">+</a></button> 

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

function statusChangeBtn(bool $status, int $id): void
{
    if ($status) {
        echo "<td>
      <form action='../actions/undone.php' method='post'>
         <button type='submit' name='id' value='$id'>❌</button>
      </form>
    </td>";
    } else {
        echo "<td>
      <form action='../actions/done.php' method='post'>
         <button type='submit' name='id' value='$id'>✅</button>
      </form>
    </td>";
    }
}

function editBtn(int $id): void
{
    echo "<td>
      <form action='../views/form_edit.php' method='post'>
        <button type='submit' name='id' value='$id'>✏️</button>
      </form>
    </td>";
}

function deleteBtn(int $id): void
{
    echo "<td>
      <form action='../actions/delete.php' method='post'>
        <button type='submit' name='id' value='$id'>🗑️</button>
      </form>
    </td>";
}
