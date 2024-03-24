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

        if (isset($this->routes[$method][$route])) {
            $action = $this->routes[$method][$route];
            $this->callAction($action);
        } else {
            include PAGE_PATH . "/auth-404-alt.php";
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
        [$controller, $method] = $action;
        $controllerInstance = new $controller();
        $controllerInstance->$method();
    }
}
