    <?php

namespace app\controllers;

use app\helpers\Tables;
use app\helpers\TaskFields;

class Task
{
    public function create()
    {
        return [
            "view" => "task/create.php",
            "data" => [
                "title" => "Criar Tarefa"
            ]
        ];
    }

    public function edit($params)
    {
        $task = findById(Tables::Tasks, $params["task"]);
        $urgencyValues = [
          "low" => "Baixa",
          "medium" => "Média",
          "high" => "Alta"
        ];
        return ["view" => "task/edit.php", "data" => [
          "title" => "Editar tarefa",
          "task" => $task,
          "urgencyValues" => $urgencyValues
        ]];
    }

    public function update($params)
    {
        $description = filter_input(INPUT_POST, "description", FILTER_SANITIZE_SPECIAL_CHARS);
        $urgency = filter_input(INPUT_POST, "urgency", FILTER_SANITIZE_SPECIAL_CHARS);

        update(
            Tables::Tasks,
            [
                TaskFields::Description->value => $description,
                TaskFields::Urgency->value => $urgency
             ],
            (int)$params['task']
        );
        goHome();
    }

    public function done($params)
    {
        update(Tables::Tasks, [TaskFields::Done->value => 1], (int)$params['task']);
        goHome();
    }

    public function undone($params)
    {
        update(Tables::Tasks, [TaskFields::Done->value => 0], (int)$params['task']);
        goHome();
    }

    public function delete($params)
    {
        delete(Tables::Tasks, (int)$params["task"]);
        goHome();
    }

    public function save($params)
    {
        $description = filter_input(INPUT_POST, "description", FILTER_SANITIZE_SPECIAL_CHARS);
        $urgency = filter_input(INPUT_POST, "urgency", FILTER_SANITIZE_SPECIAL_CHARS);

        createTask($description, $urgency, 1);
        goHome();
    }
}
