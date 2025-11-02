<?php
/**
 * Base Controller
 * Parent class for all controllers with common functionality
 */

class BaseController
{
    /**
     * Render a view with data
     * 
     * @param string $view View file name
     * @param array $data Data to pass to view
     * @return void
     */
    protected function render(string $view, array $data = []): void
    {
        // Extract data to variables
        extract($data);
        
        // Start output buffering
        ob_start();
        
        // Include view file
        $viewPath = __DIR__ . '/../views/' . $view . '.php';
        
        if (!file_exists($viewPath)) {
            throw new Exception("View not found: {$view}");
        }
        
        require $viewPath;
        
        // Get buffered content
        $content = ob_get_clean();
        
        // Output content
        echo $content;
    }
    
    /**
     * Return JSON response
     * 
     * @param array $data Response data
     * @param int $statusCode HTTP status code
     * @return void
     */
    protected function json(array $data, int $statusCode = 200): void
    {
        http_response_code($statusCode);
        header('Content-Type: application/json');
        echo json_encode($data);
        exit;
    }
    
    /**
     * Check if request is POST
     * 
     * @return bool
     */
    protected function isPost(): bool
    {
        return $_SERVER['REQUEST_METHOD'] === 'POST';
    }
    
    /**
     * Check if request is GET
     * 
     * @return bool
     */
    protected function isGet(): bool
    {
        return $_SERVER['REQUEST_METHOD'] === 'GET';
    }
    
    /**
     * Get POST data
     * 
     * @param string|null $key Specific key or null for all
     * @param mixed $default Default value if key not found
     * @return mixed
     */
    protected function post(?string $key = null, $default = null)
    {
        if ($key === null) {
            return $_POST;
        }
        
        return $_POST[$key] ?? $default;
    }
    
    /**
     * Get GET data
     * 
     * @param string|null $key Specific key or null for all
     * @param mixed $default Default value if key not found
     * @return mixed
     */
    protected function get(?string $key = null, $default = null)
    {
        if ($key === null) {
            return $_GET;
        }
        
        return $_GET[$key] ?? $default;
    }
}
