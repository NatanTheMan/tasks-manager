<?php

return [
  "POST" => [
    "/login" => "Login@login",
    "/task/create" => "Task@save",
    "/task/[0-9]+/done" => "Task@done",
    "/task/[0-9]+/edit" => "Task@update",
    "/task/[0-9]+/undone" => "Task@undone",
    "/task/[0-9]+/delete" => "Task@delete",
  ],
  "GET" => [
    "/" => "Home@index",
    "/login" => "Login@index",
    "/logout" => "Login@exit",
    "/task/create" => "Task@create",
    "/user/create" => "User@create",
    "/task/[0-9]+/edit" => "Task@edit",
  ]
];
