<?php
/**
 * Router Class
 * 
 * Handles routing and dispatching requests to controllers
 */

declare(strict_types=1);

namespace App\Core;

class Router
{
    private array $routes;

    /**
     * Constructor
     */
    public function __construct(array $routes)
    {
        $this->routes = $routes;
    }

    /**
     * Dispatch request to appropriate controller
     */
    public function dispatch(string $url): void
    {
        // Remove leading and trailing slashes
        $url = trim($url, '/');

        // Find matching route
        if (!isset($this->routes[$url])) {
            $this->notFound();
            return;
        }

        // Parse controller and method
        [$controllerName, $method] = explode('@', $this->routes[$url]);

        // Build full controller class name
        $controllerClass = "App\\Controllers\\{$controllerName}";

        // Check if controller exists
        if (!class_exists($controllerClass)) {
            throw new \Exception("Controller {$controllerClass} not found");
        }

        // Create controller instance
        $controller = new $controllerClass();

        // Check if method exists
        if (!method_exists($controller, $method)) {
            throw new \Exception("Method {$method} not found in {$controllerClass}");
        }

        // Call controller method
        $controller->$method();
    }

    /**
     * Handle 404 Not Found
     */
    private function notFound(): void
    {
        http_response_code(404);
        require APP_PATH . '/Views/errors/404.php';
    }
}
