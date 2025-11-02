<?php
/**
 * Application Class
 * 
 * Main application class that initializes and runs the application
 */

declare(strict_types=1);

namespace App\Core;

class Application
{
    private array $config;
    private Router $router;

    /**
     * Constructor
     */
    public function __construct(array $config)
    {
        $this->config = $config;
        $this->init();
    }

    /**
     * Initialize application
     */
    private function init(): void
    {
        // Set timezone
        date_default_timezone_set($this->config['app']['timezone']);

        // Error reporting based on environment
        if ($this->config['app']['env'] === 'development') {
            error_reporting(E_ALL);
            ini_set('display_errors', '1');
        } else {
            error_reporting(0);
            ini_set('display_errors', '0');
        }

        // Initialize router
        $this->router = new Router($this->config['routes']);
    }

    /**
     * Run the application
     */
    public function run(): void
    {
        try {
            $url = $_GET['url'] ?? '';
            $this->router->dispatch($url);
        } catch (\Exception $e) {
            $this->handleException($e);
        }
    }

    /**
     * Handle exceptions
     */
    private function handleException(\Exception $e): void
    {
        if ($this->config['app']['debug']) {
            echo '<h1>Error</h1>';
            echo '<p>' . $e->getMessage() . '</p>';
            echo '<pre>' . $e->getTraceAsString() . '</pre>';
        } else {
            // Show generic error page
            http_response_code(500);
            require APP_PATH . '/Views/errors/500.php';
        }
    }

    /**
     * Get configuration value
     */
    public function config(string $key, mixed $default = null): mixed
    {
        $keys = explode('.', $key);
        $value = $this->config;

        foreach ($keys as $k) {
            if (!isset($value[$k])) {
                return $default;
            }
            $value = $value[$k];
        }

        return $value;
    }
}
