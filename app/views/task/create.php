<?php require VIEWS . "/header.php"; ?>

<h1>Criar tarefa</h1> 
<form action="/task/create" method="post">
  <label for="description">Tarefa: </label>
  <input type="text" name="description" id="description">
  <select name="urgency">
    <option value="low" selected>Baixa</option>
    <option value="medium">Média</option>
    <option value="high">Alta</option>
  </select>

  <button>Adicionar</button>
</form>
