<!DOCTYPE html>
<html lang='pt-br'>
 <head>
   <meta charset='UTF-8'>
   <meta name='viewport' content='width=device-width, initial-scale=1'>
   <title>Criar tarefa</title>
 </head>
 <body>
  <h1>Criar tarefa</h1> 
    <form action="../actions/create.php" method="post">
      <label for="description">Tarefa: </label>
      <input type="text" name="description" id="description">
      <select name="urgency">
        <option value="low" selected>Baixa</option>
        <option value="medium">Média</option>
        <option value="high">Alta</option>
      </select>

      <button>Adicionar</button>
    </form>
 </body>
</html>
