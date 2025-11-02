<?php

/**
 * Input Sanitizer
 * 
 * Sanitizes and validates user input
 */
class Input
{
    /**
     * Sanitize string
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
     * Get POST input
     */
    public static function post(string $key, mixed $default = null): mixed
    {
        if (!isset($_POST[$key])) {
            return $default;
        }

        if (is_string($_POST[$key])) {
            return self::sanitize($_POST[$key]);
        }

        return $_POST[$key];
    }

    /**
     * Get GET input
     */
    public static function get(string $key, mixed $default = null): mixed
    {
        if (!isset($_GET[$key])) {
            return $default;
        }

        if (is_string($_GET[$key])) {
            return self::sanitize($_GET[$key]);
        }

        return $_GET[$key];
    }
}

