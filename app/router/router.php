<?php

function routes()
{
    return require 'routes.php';
}

function getDynamicUri($routes, $uri)
{
    return array_filter(
        $routes,
        function ($value) use ($uri) {
            $regex = str_replace("/", "\/", ltrim($value, '/'));
            return preg_match("/^$regex$/", ltrim($uri, "/"));
        },
        ARRAY_FILTER_USE_KEY
    );
}

function getParams($uri, $matchedUri)
{
    if (!empty($matchedUri)) {
        $matchedKeyUri = array_keys($matchedUri)[0];
        return array_diff(
            explode("/", ltrim($uri, '/')),
            explode("/", ltrim($matchedKeyUri, '/')),
        );
    }

    return [];
}

function paramsFormat($uri, $params)
{
    $uri = explode('/', ltrim($uri, '/'));
    $formatedParams = [];
    foreach ($params as $index => $param) {
        $formatedParams[$uri[$index - 1]] = $param;
    }
    return $formatedParams;
}

function router()
{
    $uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

    $routes = routes();

    $matchedUri = array_key_exists($uri, $routes) ? [$routes[$uri]] : [];

    if (empty($matchedUri)) {
        $matchedUri = getDynamicUri($routes, $uri);
        $params = getParams($uri, $matchedUri);
        $params = paramsFormat($uri, $params);
        $matchedUri = array_values($matchedUri)[0];
    }

    if (empty($matchedUri)) {
        $matchedUri = "NotFound@index";
    }

    return loadController($matchedUri, $params);
}
