<?php

namespace app\controllers;

class User
{
    public function create()
    {
        return [
            "view" => "/user/create.php",
            "data" => ["title" => "Criar conta"]
        ];
    }

    public function save()
    {
        $hasError = false;

        $name = filter_input(INPUT_POST, "name", FILTER_SANITIZE_SPECIAL_CHARS);
        $email = filter_input(INPUT_POST, "email", FILTER_VALIDATE_EMAIL);
        $password = filter_input(INPUT_POST, "password", FILTER_SANITIZE_SPECIAL_CHARS);

        if (empty($name)) {
            $hasError = true;
            setFlash("name", "Campo obrigatorio");
        }
        if (empty($email)) {
            $hasError = true;
            setFlash("email", "Campo obrigatorio");
        }
        if (empty($password)) {
            $hasError = true;
            setFlash("password", "Campo obrigatorio");
        }

        if (!$email) {
            $hasError = true;
            setFlash("email", "Email invalido");
        }

        if (strlen($password) < 8) {
            $hasError = true;
            setFlash("password", "Senha deve conter pelo menos 8 caracteres");
        }

        if ($hasError) {
            return redirect("/user/create");
        }

        createUser($name, $email, password_hash($password, PASSWORD_ARGON2ID));
        $_SESSION["logged"] = findBy("users", "email", $email);
        return redirect("/");
    }
}
