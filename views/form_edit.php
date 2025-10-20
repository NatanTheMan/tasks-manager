<!DOCTYPE html>
<html lang='pt-br'>
 <head>
   <meta charset='UTF-8'>
   <meta name='viewport' content='width=device-width, initial-scale=1'>
   <title>Atualizar tarefa</title>
 </head>
 <body>
<?php require '../includes/header.php';
generateHeader();?>
  <h1>Atualizar tarefa</h1> 
    <form action="../actions/update.php" method="post">
      <label for="description">Tarefa: </label>
<?php
require '../actions/getOne.php';

[$id,$description,$done,$urgency] = getOne($_POST['id']);

echo "<input type='text' name='description' id='description' value='$description'>";
echo "<select name='urgency'>";

if ($urgency === 'low') {
    echo "<option value='low' selected>Baixa</option>";
} else {
    echo "<option value='low'>Baixa</option>";
}
if ($urgency === 'medium') {
    echo "<option value='medium' selected>Média</option>";
} else {
    echo "<option value='medium'>Média</option>";
}
if ($urgency === 'high') {
    echo "<option value='high' selected>Alta</option>";
} else {
    echo "<option value='high'>Alta</option>";
}

echo "</select>";
echo  "<button type='submit' name='id' value='$id'>Editar</button>";
?>

    </form>
 </body>
</html>
