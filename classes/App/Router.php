<?php

namespace App;

class Router
{
    private $controller;
    private $method;
    private $params;

    private const DEFAULT_CONTROLLER = 'Main';
    private const DEFAULT_METHOD = 'index';

    private function getRequestPath() 
    {
        if (!empty($_SERVER['REQUEST_URI']))
        {
            return trim($_SERVER['REQUEST_URI'], '/');
        }
    }

    private function parseUri($uri)
    {
        $segments = explode('/', $uri);

        foreach ($segments as $key => $value) {
            if ($value === '') {
                unset($segments[$key]);
            }
        }

        sort($segments);

        if (!isset($segments[0])) {
            $this->controller = self::DEFAULT_CONTROLLER;      
            array_shift($segments);
        } else {
            $this->controller = array_shift($segments);
        }

        if (!isset($segments[0])) {
            $this->method = self::DEFAULT_METHOD;
            array_shift($segments);
        } else {
            $this->method = array_shift($segments);
        }

        $this->params = array_shift($segments);
    }

    public function run()
    {
        $uri = $this->getRequestPath();
        $this->parseUri($uri);

        $controllerCase = $this->controller;
        $methodName = $this->method;

        if (
            class_exists("\\Controllers\\$controllerCase\\Controller") && 
            method_exists("\\Controllers\\$controllerCase\\Controller", $methodName)
        ) {
            $controller = "\\Controllers\\$controllerCase\\Controller";
            $controllerObj = new $controller;
            $controllerObj->$methodName();
        } else {
            $controller = "\\Controllers\\Notfound\\Controller";
            $controllerObj = new $controller;
            $controllerObj->NFMethod();
        }
    }
}
