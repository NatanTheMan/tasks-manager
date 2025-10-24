<?php

namespace app\controllers;

class NotFound
{
    public function index()
    {
        return [
          "view" => "notFound.php",
          "data" => ["title" => "Not Found"]
        ];
    }
}
