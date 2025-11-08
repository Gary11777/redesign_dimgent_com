<?php

declare(strict_types=1);

/**
 * Security Helper
 *
 * Provides security-related functions: CSRF, XSS prevention, input validation
 */
class Security
{
    /**
     * Generate or return existing CSRF token
     */
    public static function generateCsrfToken(): string
    {
        $tokenName = Config::get('security.csrf_token_name', 'csrf_token');

        if (empty($_SESSION[$tokenName])) {
            $_SESSION[$tokenName] = bin2hex(random_bytes(32));
        }

        return $_SESSION[$tokenName];
    }

    /**
     * Verify CSRF token
     */
    public static function verifyCsrfToken(?string $token): bool
    {
        $tokenName = Config::get('security.csrf_token_name', 'csrf_token');
        $sessionToken = $_SESSION[$tokenName] ?? null;

        return $token !== null && $sessionToken !== null && hash_equals($sessionToken, $token);
    }

    /**
     * Escape output to prevent XSS
     */
    public static function escape(string $value): string
    {
        return htmlspecialchars($value, ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8');
    }

    /**
     * Sanitize input string
     */
    public static function sanitize(string $value): string
    {
        $value = trim($value);
        $value = strip_tags($value);
        return htmlspecialchars($value, ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8');
    }

    /**
     * Validate email address
     */
    public static function validateEmail(string $email): bool
    {
        return filter_var($email, FILTER_VALIDATE_EMAIL) !== false;
    }

    /**
     * Validate string length
     */
    public static function validateLength(string $value, int $min = 0, int $max = 255): bool
    {
        $length = mb_strlen($value);
        return $length >= $min && $length <= $max;
    }

    /**
     * Validate against regex pattern
     */
    public static function validatePattern(string $value, string $pattern): bool
    {
        return (bool) preg_match($pattern, $value);
    }

    /**
     * Get client IP address
     */
    public static function getClientIp(): string
    {
        $ipKeys = [
            'HTTP_CLIENT_IP',
            'HTTP_X_FORWARDED_FOR',
            'HTTP_X_FORWARDED',
            'HTTP_X_CLUSTER_CLIENT_IP',
            'HTTP_FORWARDED_FOR',
            'HTTP_FORWARDED',
            'REMOTE_ADDR'
        ];

        foreach ($ipKeys as $key) {
            if (!empty($_SERVER[$key])) {
                $ipList = explode(',', (string) $_SERVER[$key]);
                foreach ($ipList as $ip) {
                    $ip = trim($ip);
                    if (filter_var($ip, FILTER_VALIDATE_IP, FILTER_FLAG_NO_PRIV_RANGE | FILTER_FLAG_NO_RES_RANGE)) {
                        return $ip;
                    }
                }
            }
        }

        return $_SERVER['REMOTE_ADDR'] ?? '0.0.0.0';
    }
}
