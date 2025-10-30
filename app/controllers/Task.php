<?php

namespace app\controllers;

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
        $task = findBy("tasks", "id", (int)$params["task"]);
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

        editTask($description, $urgency, (int)$params['task']);
        redirect("/");
    }

    public function done($params)
    {
        editStatus(1, (int)$params['task']);
        redirect("/");
    }

    public function undone($params)
    {
        editStatus(0, (int)$params['task']);
        redirect("/");
    }

    public function delete($params)
    {
        delete("tasks", (int)$params["task"]);
        redirect("/");
    }

    public function save($params)
    {
        $description = filter_input(INPUT_POST, "description", FILTER_SANITIZE_SPECIAL_CHARS);
        $urgency = filter_input(INPUT_POST, "urgency", FILTER_SANITIZE_SPECIAL_CHARS);
        createTask($description, $urgency, $_SESSION["logged"]->id);
        redirect("/");
    }
}
