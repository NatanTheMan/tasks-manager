<?php

namespace app\controllers;

class User
{
    public function create()
    {
        return [
            "view" => "user/create.php",
            "data" => ["title" => "Criar conta"]
        ];
    }
}
