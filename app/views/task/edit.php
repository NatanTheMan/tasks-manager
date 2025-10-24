<h1>Atualizar tarefa</h1> 
<form action="/task/<?= $task->id ?>/edit" method="post">
  <label for="description">Tarefa: </label><br>
  <input type="text" name="description" id="description" value="<?= $task->description ?>">

  <select name="urgency">
    <?php foreach ($urgencyValues as $urgency => $value) : ?>
      <option value="<?= $urgency ?>" <?php echo when($task->urgency === $urgency, "selected"); ?>>
        <?= $value ?>
      </option>
    <?php endforeach ?>
  </select><br>

  <button type="submit">Editar</button>
</form>
