<?php

// Disable error reporting for production
ini_set('display_errors', 1);
error_reporting(E_ALL);

define('APP_ROOT', dirname(__DIR__));

// Include the application bootstrap file
require APP_ROOT . '/bootstrap/app.php';

$routes = include APP_ROOT . '/routes/web.php';

// Get the base path of the application
$basePath = 'aqidfamous/public';

// Parse and clean the current URI
$uri = trim(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH), '/');

// Remove the base path from the URI
if (strpos($uri, $basePath) === 0) {
    $uri = substr($uri, strlen($basePath));
}
$uri = trim($uri, '/');

if (isset($routes[$uri])) {
    // Controller and method handling
    [$controller, $method] = explode('@', $routes[$uri]);
    $controllerPath = APP_ROOT . '/app/Controllers/' . $controller . '.php';

    if (file_exists($controllerPath)) {
        require_once $controllerPath;
        $controllerInstance = new $controller();

        if (method_exists($controllerInstance, $method)) {
            echo $controllerInstance->$method();
        } else {
            http_response_code(404);
            echo "Method not found.";
        }
    } else {
        http_response_code(404);
        echo "Controller not found.";
    }
} else {
    http_response_code(404);
    echo "Page not found.";
}
