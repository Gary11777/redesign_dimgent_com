<?php

declare(strict_types=1);

/**
 * Security Helper
 * 
 * Provides security functions: CSRF, XSS prevention, input validation
 */
class Security
{
    /**
     * Generate CSRF token
     */
    public static function generateCsrfToken(): string
    {
        if (!isset($_SESSION[Config::get('security.csrf_token_name')])) {
            $_SESSION[Config::get('security.csrf_token_name')] = bin2hex(random_bytes(32));
        }
        return $_SESSION[Config::get('security.csrf_token_name')];
    }

    /**
     * Verify CSRF token
     */
    public static function verifyCsrfToken(string $token): bool
    {
        $sessionToken = $_SESSION[Config::get('security.csrf_token_name')] ?? null;
        return $sessionToken !== null && hash_equals($sessionToken, $token);
    }

    /**
     * Escape output to prevent XSS
     */
    public static function escape(string $string): string
    {
        return htmlspecialchars($string, ENT_QUOTES, 'UTF-8');
    }

    /**
     * Sanitize input
     */
    public static function sanitize(string $input): string
    {
        $input = trim($input);
        $input = stripslashes($input);
        $input = htmlspecialchars($input, ENT_QUOTES, 'UTF-8');
        return $input;
    }

    /**
     * Validate email
     */
    public static function validateEmail(string $email): bool
    {
        return filter_var($email, FILTER_VALIDATE_EMAIL) !== false;
    }

    /**
     * Validate string length
     */
    public static function validateLength(string $string, int $min = 0, int $max = 10000): bool
    {
        $length = mb_strlen($string, 'UTF-8');
        return $length >= $min && $length <= $max;
    }

    /**
     * Validate against regex pattern
     */
    public static function validatePattern(string $string, string $pattern): bool
    {
        return (bool) preg_match($pattern, $string);
    }

    /**
     * Get client IP address
     */
    public static function getClientIp(): string
    {
        $ipKeys = ['HTTP_CLIENT_IP', 'HTTP_X_FORWARDED_FOR', 'REMOTE_ADDR'];
        
        foreach ($ipKeys as $key) {
            if (!empty($_SERVER[$key])) {
                $ip = $_SERVER[$key];
                if (strpos($ip, ',') !== false) {
                    $ip = explode(',', $ip)[0];
                }
                $ip = trim($ip);
                if (filter_var($ip, FILTER_VALIDATE_IP, FILTER_FLAG_NO_PRIV_RANGE | FILTER_FLAG_NO_RES_RANGE)) {
                    return $ip;
                }
            }
        }
        
        return $_SERVER['REMOTE_ADDR'] ?? '0.0.0.0';
    }
}

