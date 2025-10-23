<?php

namespace app\controllers;

class User
{
    public function login()
    {
        require VIEWS . '/user/login.php';
    }

    public function create()
    {
        require VIEWS . 'user/create.php';
    }
}
