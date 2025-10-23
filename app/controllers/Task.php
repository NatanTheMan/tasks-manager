<?php

namespace app\controllers;

class Task
{
    public function create()
    {
        require VIEWS . '/task/create.php';
    }

    public function edit()
    {
        require VIEWS . '/task/edit.php';
    }
}
