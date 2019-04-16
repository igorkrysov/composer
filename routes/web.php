<?php

$dispatcher = FastRoute\simpleDispatcher(function(FastRoute\RouteCollector $r) {
    $r->addRoute('GET', '/users', 'UserController@getUsers');
    $r->addRoute('GET', '/user', 'UserController@getUser');
    $r->addRoute('GET', '/create-user', 'UserController@createUser');
    // {id} must be a number (\d+)    
});

// Fetch method and URI from somewhere
$httpMethod = $_SERVER['REQUEST_METHOD'];
$uri = $_SERVER['REQUEST_URI'];

// Strip query string (?foo=bar) and decode URI
if (false !== $pos = strpos($uri, '?')) {
    $uri = substr($uri, 0, $pos);
}
$uri = rawurldecode($uri);

$routeInfo = $dispatcher->dispatch($httpMethod, $uri);

switch ($routeInfo[0]) {
    case FastRoute\Dispatcher::NOT_FOUND:
        // ... 404 Not Found
        break;
    case FastRoute\Dispatcher::METHOD_NOT_ALLOWED:
        $allowedMethods = $routeInfo[1];
        // ... 405 Method Not Allowed
        break;
    case FastRoute\Dispatcher::FOUND:
        $handler = $routeInfo[1];
        $vars = $routeInfo[2];
        if (strpos($handler, '@')) {
            $expl = explode('@', $handler);
            $class = 'App\\Controllers\\' . $expl[0];
            $method = $expl[1];

            $obj = new $class();
            $obj->$method($vars);
        } else {
            'Not found<br>';
        }
        
        break;
}