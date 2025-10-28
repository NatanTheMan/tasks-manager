<?php

namespace app\controllers;

use app\helpers\Tables;
use app\helpers\TaskFields;

class Task
{
    public function create()
    {
        require VIEWS . "/task/create.php";
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
        update(
            Tables::Tasks,
            [TaskFields::Description->value => $_POST['description'],
                  TaskFields::Urgency->value => $_POST['urgency']],
            (int)$params['task']
        );
        goHome();
    }

    public function done($params)
    {
        update(Tables::Tasks,[TaskFields::Done->value => 1], (int)$params['task']);
        goHome();
    }

    public function undone($params)
    {
        update(Tables::Tasks,[TaskFields::Done->value => 0], (int)$params['task']);
        goHome();
    }
}
