<?php

namespace app\controllers;

use app\helpers\Tables;

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
}
