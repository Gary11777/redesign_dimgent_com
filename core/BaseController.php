<?php

declare(strict_types=1);

use League\Plates\Engine;

/**
 * Base Controller
 * 
 * Base class for all controllers with Plates integration
 */
abstract class BaseController
{
    protected Engine $templates;

    public function __construct()
    {
        // Initialize Plates template engine
        $this->templates = new Engine('views');
        
        // Add helper functions
        $this->templates->registerFunction('escape', [Security::class, 'escape']);
        $this->templates->registerFunction('config', [Config::class, 'get']);
        $this->templates->registerFunction('asset', function($path) {
            // Remove 'public/' if it's already in the path
            $path = str_replace('public/', '', $path);
            return '/public/' . ltrim($path, '/');
        });
        $this->templates->registerFunction('image', function($path) {
            $imagePath = Config::get('paths.images') . '/' . $path;
            return '/' . ltrim($imagePath, '/');
        });
    }

    /**
     * Render a template
     */
    protected function render(string $template, array $data = []): void
    {
        // Add common data to all templates
        $data['csrf_token'] = Security::generateCsrfToken();
        $data['site'] = Config::get('site', []);
        
        echo $this->templates->render($template, $data);
    }

    /**
     * Redirect to URL (PRG pattern)
     */
    protected function redirect(string $url, int $code = 302): void
    {
        header("Location: {$url}", true, $code);
        exit;
    }

    /**
     * Get POST data
     */
    protected function post(string $key, mixed $default = null): mixed
    {
        return $_POST[$key] ?? $default;
    }

    /**
     * Get GET data
     */
    protected function get(string $key, mixed $default = null): mixed
    {
        return $_GET[$key] ?? $default;
    }
}

