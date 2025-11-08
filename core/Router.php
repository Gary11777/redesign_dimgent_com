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
     * Register a new route
     */
    public function add(string $method, string $path, string $controller, string $action): void
    {
        $this->routes[] = [
            'method' => strtoupper($method),
            'path' => rtrim($path, '/') ?: '/',
            'controller' => $controller,
            'action' => $action,
        ];
    }

    public function get(string $path, string $controller, string $action): void
    {
        $this->add('GET', $path, $controller, $action);
    }

    public function post(string $path, string $controller, string $action): void
    {
        $this->add('POST', $path, $controller, $action);
    }

    /**
     * Dispatch current request
     */
    public function dispatch(): void
    {
        $requestMethod = strtoupper($_SERVER['REQUEST_METHOD'] ?? 'GET');
        $requestUri = $_SERVER['REQUEST_URI'] ?? '/';

        $path = parse_url($requestUri, PHP_URL_PATH) ?: '/';
        $path = rtrim($path, '/') ?: '/';

        foreach ($this->routes as $route) {
            if ($route['method'] === $requestMethod && $route['path'] === $path) {
                $this->invoke($route['controller'], $route['action']);
                return;
            }
        }

        http_response_code(404);
        $this->invoke('Error', 'notFound');
    }

    /**
     * Call a controller action
     */
    private function invoke(string $controllerName, string $action): void
    {
        $controllerFile = "controllers/{$controllerName}Controller.php";
        if (!file_exists($controllerFile)) {
            throw new RuntimeException("Controller file not found: {$controllerFile}");
        }
        require_once $controllerFile;

        $controllerClass = $controllerName . 'Controller';
        if (!class_exists($controllerClass)) {
            throw new RuntimeException("Controller class not found: {$controllerClass}");
        }

        $controller = new $controllerClass();
        if (!method_exists($controller, $action)) {
            throw new RuntimeException("Action {$action} not found in {$controllerClass}");
        }

        $controller->{$action}();
    }
}
