<?php

namespace App\Core;

class Router
{
    protected array $routes = [];

    public function get($url, $action)
    {
        $this->routes['GET'][$url] = $action;
    }

    public function post($url, $action)
    {
        $this->routes['POST'][$url] = $action;
    }

    public function put($url, $action)
    {
        $this->routes['PUT'][$url] = $action;
    }

    public function patch($url, $action)
    {
        $this->routes['PATCH'][$url] = $action;
    }

    public function delete($url, $action)
    {
        $this->routes['DELETE'][$url] = $action;
    }

    public function dispatch()
    {
        $method = $_SERVER['REQUEST_METHOD'];
        $url = $this->getUrl();
        $route = $url ? '/' . $url : "/";

        $urlParts = explode('/', trim($route, '/'));
        foreach ($this->routes[$method] as $routePattern => $action) {
            // Step 3: Check if the route pattern matches the URL path
            $routeParts = explode('/', trim($routePattern, '/'));

            // If the number of parts in both arrays is not the same, they don't match
            if (count($urlParts) !== count($routeParts)) {
                continue;
            }

            $match = true;
            $params = [];

            foreach ($routeParts as $key => $part) {
                if ($part === ':id') {
                    $params[] = $urlParts[$key];
                } elseif ($part !== $urlParts[$key]) {
                    // If any part doesn't match, set match to false and break
                    $match = false;
                    break;
                }
            }

            if ($match) {
                array_push($action, ...$params);
                $this->callAction($action);
                exit; // Exit the loop since a match is found
            }
        }
    }

    public function getUrl()
    {
        if (isset($_GET['url'])) {
            $url = rtrim($_GET['url'], '/');
            return filter_var($url, FILTER_SANITIZE_URL);
        } else {
            return null;
        }
    }

    protected function callAction($action)
    {
        [$controller, $method, $params] = $action;
        $controllerInstance = new $controller();
        $controllerInstance->$method($params);
    }
}
