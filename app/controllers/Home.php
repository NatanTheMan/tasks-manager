<?php

namespace app\controllers;

class Home
{
    public function index()
    {
        $colorSettings = ["low" => "#bbb", "medium" => "#d2a", "high" => "#f00"];
        $tasks = findAll("tasks", condition:"WHERE user_id=" . $_SESSION["logged"]->id);
        return [
          "view" => "home.php",
          "data" => [
              "title" => "Home",
              "tasks" => $tasks,
              "colorSettings" => $colorSettings
          ]
        ];
    }
}
