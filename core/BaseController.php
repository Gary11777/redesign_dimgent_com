<?php

declare(strict_types=1);

use League\Plates\Engine;

/**
 * Base Controller
 *
 * Provides common functionality for all controllers
 */
abstract class BaseController
{
    protected Engine $templates;

    public function __construct()
    {
        $this->templates = new Engine('views');

        // Register helper functions for templates
        $this->templates->registerFunction('e', [Security::class, 'escape']);
        $this->templates->registerFunction('config', [Config::class, 'get']);
        $this->templates->registerFunction('asset', function (string $path): string {
            $path = ltrim($path, '/');
            return '/public/' . $path;
        });
        $this->templates->registerFunction('image', function (string $path): string {
            $base = Config::get('paths.images', 'drafts/pics');
            $path = ltrim($path, '/');
            return '/' . trim($base, '/') . '/' . $path;
        });
        $this->templates->registerFunction('logo', function (): string {
            return '/' . ltrim(Config::get('paths.logo', 'drafts/pics/logo.png'), '/');
        });
    }

    /**
     * Render a template using Plates
     */
    protected function render(string $template, array $data = []): void
    {
        $data['csrf_token'] = Security::generateCsrfToken();
        $data['site'] = Config::get('site', []);

        echo $this->templates->render($template, $data);
    }

    /**
     * Redirect to URL (PRG pattern)
     */
    protected function redirect(string $url, int $status = 302): void
    {
        header('Location: ' . $url, true, $status);
        exit;
    }

    protected function post(string $key, mixed $default = null): mixed
    {
        return $_POST[$key] ?? $default;
    }

    protected function get(string $key, mixed $default = null): mixed
    {
        return $_GET[$key] ?? $default;
    }
}
