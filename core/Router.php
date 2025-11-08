<?php

declare(strict_types=1);

/**
 * Router
 * 
 * Handles routing and dispatches requests to controllers
 */
class Router
{
    private array $routes = [];

    /**
     * Add a route
     */
    public function add(string $method, string $path, string $controller, string $action): void
    {
        $this->routes[] = [
            'method' => strtoupper($method),
            'path' => $path,
            'controller' => $controller,
            'action' => $action
        ];
    }

    /**
     * Add GET route
     */
    public function get(string $path, string $controller, string $action): void
    {
        $this->add('GET', $path, $controller, $action);
    }

    /**
     * Add POST route
     */
    public function post(string $path, string $controller, string $action): void
    {
        $this->add('POST', $path, $controller, $action);
    }

    /**
     * Dispatch request
     */
    public function dispatch(): void
    {
        $requestMethod = $_SERVER['REQUEST_METHOD'] ?? 'GET';
        $requestUri = $_SERVER['REQUEST_URI'] ?? '/';
        
        // Remove query string
        $requestPath = parse_url($requestUri, PHP_URL_PATH);
        
        // Remove base path if exists
        $basePath = dirname($_SERVER['SCRIPT_NAME']);
        if ($basePath !== '/' && strpos($requestPath, $basePath) === 0) {
            $requestPath = substr($requestPath, strlen($basePath));
        }
        
        $requestPath = $requestPath ?: '/';

        foreach ($this->routes as $route) {
            if ($route['method'] === $requestMethod && $route['path'] === $requestPath) {
                $this->callController($route['controller'], $route['action']);
                return;
            }
        }

        // 404
        http_response_code(404);
        $this->callController('Error', 'notFound');
    }

    /**
     * Call controller action
     */
    private function callController(string $controllerName, string $action): void
    {
        $controllerFile = "controllers/{$controllerName}Controller.php";
        
        if (!file_exists($controllerFile)) {
            throw new Exception("Controller not found: {$controllerFile}");
        }

        require_once $controllerFile;

        $controllerClass = $controllerName . 'Controller';
        
        if (!class_exists($controllerClass)) {
            throw new Exception("Controller class not found: {$controllerClass}");
        }

        $controller = new $controllerClass();
        
        if (!method_exists($controller, $action)) {
            throw new Exception("Action not found: {$action} in {$controllerClass}");
        }

        $controller->$action();
    }
}

