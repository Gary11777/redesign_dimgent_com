<?php
/**
 * Helper Functions
 * Reusable utility functions for the Dimgent Technologies website
 */

/**
 * Sanitize input data
 * 
 * @param string $data The data to sanitize
 * @return string Sanitized data
 */
function sanitize_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data, ENT_QUOTES, 'UTF-8');
    return $data;
}

/**
 * Validate email address
 * 
 * @param string $email Email to validate
 * @return bool True if valid, false otherwise
 */
function validate_email($email) {
    return filter_var($email, FILTER_VALIDATE_EMAIL) !== false;
}

/**
 * Verify Google reCAPTCHA v3 token
 * 
 * @param string $token The reCAPTCHA token
 * @param string $secret The reCAPTCHA secret key
 * @return bool True if verification successful, false otherwise
 */
function verify_recaptcha($token, $secret) {
    $url = 'https://www.google.com/recaptcha/api/siteverify';
    $data = [
        'secret' => $secret,
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
    $result = file_get_contents($url, false, $context);
    
    if ($result === false) {
        return false;
    }
    
    $response = json_decode($result);
    
    // Check if verification was successful and score is above threshold
    return $response->success && isset($response->score) && $response->score >= 0.5;
}

/**
 * Validate contact form fields
 * 
 * @param array $fields Form fields to validate
 * @return array Array with 'valid' boolean and 'errors' array
 */
function validate_contact_form($fields) {
    $errors = [];
    
    // Check required fields
    if (empty($fields['name'])) {
        $errors[] = 'Name is required';
    }
    
    if (empty($fields['email'])) {
        $errors[] = 'Email is required';
    } elseif (!validate_email($fields['email'])) {
        $errors[] = 'Invalid email address';
    }
    
    if (empty($fields['message'])) {
        $errors[] = 'Message is required';
    }
    
    return [
        'valid' => empty($errors),
        'errors' => $errors
    ];
}

/**
 * Get the current page name
 * 
 * @return string Current page name
 */
function get_current_page() {
    $page = basename($_SERVER['PHP_SELF'], '.php');
    return $page === 'index' ? 'home' : $page;
}

/**
 * Check if current page is active
 * 
 * @param string $page Page name to check
 * @return bool True if current page matches
 */
function is_active_page($page) {
    return get_current_page() === $page;
}

/**
 * Generate navigation link class
 * 
 * @param string $page Page name
 * @return string CSS classes for navigation link
 */
function nav_class($page) {
    return is_active_page($page) ? 'active' : '';
}

/**
 * Load configuration file
 * 
 * @param string $config_name Name of config file without .php extension
 * @return array Configuration array
 */
function load_config($config_name) {
    $config_path = __DIR__ . '/../config/' . $config_name . '.php';
    if (file_exists($config_path)) {
        return require $config_path;
    }
    return [];
}

/**
 * Get asset URL
 * 
 * @param string $path Path to asset relative to assets folder
 * @return string Full asset URL
 */
function asset($path) {
    return '/assets/' . ltrim($path, '/');
}

/**
 * Escape output for HTML
 * 
 * @param string $string String to escape
 * @return string Escaped string
 */
function e($string) {
    return htmlspecialchars($string, ENT_QUOTES, 'UTF-8');
}
