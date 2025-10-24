<?php

function loadController($uri)
{
    [$controller, $method] = explode('@', $uri);

    $controllerWihNamespace = "app\\controllers\\" . $controller;

    if (!class_exists($controllerWihNamespace)) {
        throw new Exception("Controller $controller dont exists");
    }

    if (!method_exists($controllerWihNamespace, $method)) {
        throw new Exception("Method $method on $controller, dont exists");
    }

    $controllerInstance = new $controllerWihNamespace();

    return $controllerInstance->$method();
}
