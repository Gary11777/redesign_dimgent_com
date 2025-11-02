<?php
/**
 * Helper Functions
 * Reusable utility functions for the application
 */

/**
 * Load configuration file
 * 
 * @param string $name Configuration file name without .php extension
 * @return array Configuration array
 */
function config(string $name): array
{
    $path = __DIR__ . '/../config/' . $name . '.php';
    if (!file_exists($path)) {
        throw new Exception("Configuration file not found: {$name}");
    }
    return require $path;
}

/**
 * Sanitize input data
 * 
 * @param string $data Input data to sanitize
 * @return string Sanitized data
 */
function sanitize(string $data): string
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data, ENT_QUOTES, 'UTF-8');
    return $data;
}

/**
 * Validate email address
 * 
 * @param string $email Email address to validate
 * @return bool True if valid, false otherwise
 */
function validateEmail(string $email): bool
{
    return filter_var($email, FILTER_VALIDATE_EMAIL) !== false;
}

/**
 * Check if current page is active
 * 
 * @param string $page Page name or path
 * @return bool True if active, false otherwise
 */
function isActivePage(string $page): bool
{
    $currentPage = basename($_SERVER['PHP_SELF']);
    
    if ($page === '/' && $currentPage === 'index.php') {
        return true;
    }
    
    return strpos($currentPage, $page) !== false;
}

/**
 * Get active class for navigation
 * 
 * @param string $page Page name or path
 * @return string Active class or empty string
 */
function activeClass(string $page): string
{
    return isActivePage($page) ? 'active' : '';
}

/**
 * Escape output for display
 * 
 * @param string $data Data to escape
 * @return string Escaped data
 */
function e(string $data): string
{
    return htmlspecialchars($data, ENT_QUOTES, 'UTF-8');
}

/**
 * Redirect to another page
 * 
 * @param string $url URL to redirect to
 * @return void
 */
function redirect(string $url): void
{
    header("Location: {$url}");
    exit;
}

/**
 * Get base URL
 * 
 * @return string Base URL
 */
function baseUrl(): string
{
    $protocol = isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? 'https' : 'http';
    $host = $_SERVER['HTTP_HOST'];
    $script = str_replace(basename($_SERVER['SCRIPT_NAME']), '', $_SERVER['SCRIPT_NAME']);
    return $protocol . '://' . $host . $script;
}

/**
 * Get asset URL
 * 
 * @param string $path Asset path
 * @return string Full asset URL
 */
function asset(string $path): string
{
    return baseUrl() . ltrim($path, '/');
}

/**
 * Load JSON data file
 * 
 * @param string $filename JSON filename
 * @return array Decoded JSON data
 */
function loadJsonData(string $filename): array
{
    $path = __DIR__ . '/../data/' . $filename;
    if (!file_exists($path)) {
        return [];
    }
    
    $json = file_get_contents($path);
    return json_decode($json, true) ?? [];
}

/**
 * Set flash message
 * 
 * @param string $type Message type (success, error, info)
 * @param string $message Message content
 * @return void
 */
function setFlash(string $type, string $message): void
{
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }
    $_SESSION['flash'] = ['type' => $type, 'message' => $message];
}

/**
 * Get and clear flash message
 * 
 * @return array|null Flash message or null
 */
function getFlash(): ?array
{
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }
    
    if (isset($_SESSION['flash'])) {
        $flash = $_SESSION['flash'];
        unset($_SESSION['flash']);
        return $flash;
    }
    
    return null;
}

/**
 * Verify reCAPTCHA token
 * 
 * @param string $token reCAPTCHA token
 * @return bool True if valid, false otherwise
 */
function verifyRecaptcha(string $token): bool
{
    $config = config('recaptcha');
    
    $data = [
        'secret' => $config['secret_key'],
        'response' => $token,
        'remoteip' => $_SERVER['REMOTE_ADDR']
    ];
    
    $options = [
        'http' => [
            'header' => "Content-type: application/x-www-form-urlencoded\r\n",
            'method' => 'POST',
            'content' => http_build_query($data)
        ]
    ];
    
    $context = stream_context_create($options);
    $result = file_get_contents($config['verify_url'], false, $context);
    
    if ($result === false) {
        return false;
    }
    
    $response = json_decode($result, true);
    
    return isset($response['success']) && 
           $response['success'] === true && 
           $response['score'] >= $config['score_threshold'];
}
