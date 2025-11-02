<?php

/**
 * Base Controller
 * 
 * Base class for all controllers
 */
abstract class BaseController
{
    /**
     * Render a view
     */
    protected function render(string $view, array $data = []): void
    {
        extract($data);
        
        $viewPath = "views/{$view}.php";
        
        if (!file_exists($viewPath)) {
            throw new Exception("View not found: {$viewPath}");
        }

        require_once $viewPath;
    }

    /**
     * Redirect to URL
     */
    protected function redirect(string $url): void
    {
        header("Location: {$url}");
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

    /**
     * Get site configuration
     */
    protected function config(string $key, mixed $default = null): mixed
    {
        return Config::get($key, $default);
    }
}

