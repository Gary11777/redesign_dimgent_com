<?php
/**
 * Base Controller Class
 * 
 * All controllers extend this base controller
 */

declare(strict_types=1);

namespace App\Core;

class Controller
{
    protected View $view;
    protected array $config;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->config = require CONFIG_PATH . '/app.php';
        $this->view = new View($this->config);
    }

    /**
     * Render a view
     */
    protected function render(string $view, array $data = []): void
    {
        $this->view->render($view, $data);
    }

    /**
     * Redirect to another URL
     */
    protected function redirect(string $url, int $statusCode = 302): void
    {
        header("Location: {$url}", true, $statusCode);
        exit;
    }

    /**
     * Return JSON response
     */
    protected function json(array $data, int $statusCode = 200): void
    {
        http_response_code($statusCode);
        header('Content-Type: application/json');
        echo json_encode($data);
        exit;
    }

    /**
     * Get POST data
     */
    protected function post(?string $key = null, mixed $default = null): mixed
    {
        if ($key === null) {
            return $_POST;
        }
        return $_POST[$key] ?? $default;
    }

    /**
     * Get GET data
     */
    protected function get(?string $key = null, mixed $default = null): mixed
    {
        if ($key === null) {
            return $_GET;
        }
        return $_GET[$key] ?? $default;
    }

    /**
     * Sanitize input
     */
    protected function sanitize(string $input): string
    {
        return htmlspecialchars(trim($input), ENT_QUOTES, 'UTF-8');
    }

    /**
     * Validate email
     */
    protected function isValidEmail(string $email): bool
    {
        return filter_var($email, FILTER_VALIDATE_EMAIL) !== false;
    }
}
