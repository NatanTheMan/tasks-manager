<?php

return [
  "/" => "Home@index",
  "/login" => "User@login",
  "/user/create" => "User@create",
  "/task/create" => "Task@create",
  "/task/[0-9]+/edit" => "Task@edit",
];
