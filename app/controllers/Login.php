<?php

namespace app\controllers;

class Login
{
    public function index()
    {
        return [
            "view" => "user/login.php",
            "data" => ["title" => "Login"]
        ];
    }

    public function login()
    {
        $email = filter_input(INPUT_POST, "email", FILTER_SANITIZE_EMAIL);
        $password = filter_input(INPUT_POST, "password", FILTER_SANITIZE_SPECIAL_CHARS);

        if (empty($email) || empty($password)) {
            setFlash("message", "Usuario e senha sao campos obrigatorios");
            return redirect("/login") ;
        }


    }
}
