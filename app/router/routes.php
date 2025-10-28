<?php

return [
  "POST" => [
    "/login" => "User@login",
    "/user/create" => "User@create",
    "/task/create" => "Task@create",
    "/task/[0-9]+/edit" => "Task@update",
    "/task/[0-9]+/done" => "Task@done",
    "/task/[0-9]+/undone" => "Task@undone",
  ],
  "GET" => [
    "/task/[0-9]+/edit" => "Task@edit",
    "/" => "Home@index",
  ]
];
