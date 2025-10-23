<?php

namespace app\controllers;

use app\database\Tables;
use app\helpers\UserFields;

class Home
{
    public function index()
    {
        $tasks = findAll("tasks", condition: "where user_id=11");
        $email = '';
        $password = '';

        create(
            Tables::Users,
            [UserFields::Email, UserFields::Password],
            [$email, $password]
        );

        require VIEWS . 'home.php';
    }
}
