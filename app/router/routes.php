<?php

return [
  "POST" => [
    "/login" => "User@login",
    "/task/create" => "Task@save",
    "/user/create" => "User@create",
    "/task/[0-9]+/edit" => "Task@update",
    "/task/[0-9]+/done" => "Task@done",
    "/task/[0-9]+/undone" => "Task@undone",
    "/task/[0-9]+/delete" => "Task@delete",
  ],
  "GET" => [
    "/task/create" => "Task@create",
    "/task/[0-9]+/edit" => "Task@edit",
    "/" => "Home@index",
  ]
];
