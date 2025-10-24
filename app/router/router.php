<?php

function routes()
{
    return require 'routes.php';
}

function router()
{
    $uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

    $routes = routes();

    $matchedUri = array_key_exists($uri, $routes) ? $routes[$uri] : [];

    if (empty($matchedUri)) {
        $matchedUri = "NotFound@index";
    }

    return loadController($matchedUri);
}
