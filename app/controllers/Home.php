<?php

namespace app\controllers;

use app\helpers\Tables;

class Home
{
    public function index()
    {
        $tasks = findAll(Tables::Tasks, condition:"WHERE user_id=1");
        return [
          "view" => "home.php",
          "data" => ["title" => "Home","tasks" => $tasks]
        ];
    }
}
