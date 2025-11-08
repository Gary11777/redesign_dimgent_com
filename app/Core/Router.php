<?php

declare(strict_types=1);

namespace Core;

class Router
{
    private array $routes = [];
    private array $config = [];

    public function __construct()
    {
        // Load all configuration files
        $this->config['app'] = json_decode(file_get_contents(CONFIG_PATH . '/app.json'), true);
        
        // Load mail config if exists
        $mailConfigPath = CONFIG_PATH . '/mail.json';
        if (file_exists($mailConfigPath)) {
            $this->config['mail'] = json_decode(file_get_contents($mailConfigPath), true);
        }
        
        // Load reCAPTCHA config if exists
        $recaptchaConfigPath = CONFIG_PATH . '/recaptcha.json';
        if (file_exists($recaptchaConfigPath)) {
            $this->config['recaptcha'] = json_decode(file_get_contents($recaptchaConfigPath), true);
        }
    }

    public function get(string $path, array $callback): void
    {
        $this->routes['GET'][$path] = $callback;
    }

    public function post(string $path, array $callback): void
    {
        $this->routes['POST'][$path] = $callback;
    }

    public function dispatch(): void
    {
        $requestUri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
        $requestMethod = $_SERVER['REQUEST_METHOD'];

        if (!isset($this->routes[$requestMethod])) {
            $this->sendNotFound();
            return;
        }

        foreach ($this->routes[$requestMethod] as $path => $callback) {
            if ($path === $requestUri) {
                $this->callController($callback);
                return;
            }
        }

        $this->sendNotFound();
    }

    private function callController(array $callback): void
    {
        [$controllerName, $method] = $callback;
        
        $controller = new $controllerName($this->config);
        $controller->$method();
    }

    private function sendNotFound(): void
    {
        http_response_code(404);
        echo "404 - Page Not Found";
    }
}
