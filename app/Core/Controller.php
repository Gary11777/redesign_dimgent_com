<?php

declare(strict_types=1);

namespace Core;

use League\Plates\Engine;

abstract class Controller
{
    protected array $config;
    protected Engine $templates;

    public function __construct(array $config)
    {
        $this->config = $config;
        
        // Initialize Plates template engine
        $this->templates = new Engine(APP_PATH . '/Views');
        
        // Register template folders
        $this->templates->addFolder('layouts', APP_PATH . '/Views/layouts');
        $this->templates->addFolder('partials', APP_PATH . '/Views/partials');
        $this->templates->addFolder('components', APP_PATH . '/Views/components');
        
        // Add global data available to all templates
        $this->templates->addData([
            'config' => $config['app'],
            'currentPath' => parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH) ?? '/'
        ]);
    }

    /**
     * Render a view template
     */
    protected function view(string $view, array $data = []): void
    {
        echo $this->templates->render($view, $data);
    }

    /**
     * Return JSON response
     */
    protected function json(array $data, int $statusCode = 200): void
    {
        http_response_code($statusCode);
        header('Content-Type: application/json');
        echo json_encode($data);
    }

    /**
     * Redirect to another page
     */
    protected function redirect(string $url, int $statusCode = 302): void
    {
        http_response_code($statusCode);
        header("Location: $url");
        exit;
    }
}
