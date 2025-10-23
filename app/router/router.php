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

    loadController($matchedUri);
}
