<?php
/**
 * View Class
 * 
 * Handles rendering of views and templates
 */

declare(strict_types=1);

namespace App\Core;

class View
{
    private array $config;
    private string $layout = 'default';

    /**
     * Constructor
     */
    public function __construct(array $config)
    {
        $this->config = $config;
    }

    /**
     * Render a view with layout
     */
    public function render(string $view, array $data = []): void
    {
        // Extract data to variables
        extract($data);
        
        // Make config available in views
        $config = $this->config;

        // Start output buffering
        ob_start();

        // Include the view file
        $viewFile = APP_PATH . '/Views/' . $view . '.php';
        
        if (!file_exists($viewFile)) {
            throw new \Exception("View file {$viewFile} not found");
        }

        require $viewFile;

        // Get view content
        $content = ob_get_clean();

        // Include layout
        $layoutFile = APP_PATH . '/Views/layouts/' . $this->layout . '.php';
        
        if (!file_exists($layoutFile)) {
            throw new \Exception("Layout file {$layoutFile} not found");
        }

        require $layoutFile;
    }

    /**
     * Set layout
     */
    public function setLayout(string $layout): void
    {
        $this->layout = $layout;
    }

    /**
     * Render partial view (without layout)
     */
    public function partial(string $view, array $data = []): void
    {
        extract($data);
        $config = $this->config;

        $viewFile = APP_PATH . '/Views/' . $view . '.php';
        
        if (!file_exists($viewFile)) {
            throw new \Exception("Partial view file {$viewFile} not found");
        }

        require $viewFile;
    }

    /**
     * Escape HTML
     */
    public function e(string $string): string
    {
        return htmlspecialchars($string, ENT_QUOTES, 'UTF-8');
    }

    /**
     * Get asset URL
     */
    public function asset(string $path): string
    {
        return $this->config['app']['url'] . '/assets/' . ltrim($path, '/');
    }

    /**
     * Get URL
     */
    public function url(string $path = ''): string
    {
        return $this->config['app']['url'] . '/' . ltrim($path, '/');
    }
}
