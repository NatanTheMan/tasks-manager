<?php

namespace app\controllers;

class Task
{
    public function create()
    {
        require VIEWS . '/task/create.php';
    }

    public function edit($params)
    {
        return ['view' => 'task/edit.php', 'data' => [
          'task' => $params['task']
        ]];
    }
}
