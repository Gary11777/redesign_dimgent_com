<?php

/**
 * View Helper
 * 
 * Helper functions for views
 */
class View
{
    /**
     * Escape output
     */
    public static function escape(string $string): string
    {
        return htmlspecialchars($string, ENT_QUOTES, 'UTF-8');
    }

    /**
     * Get asset URL
     */
    public static function asset(string $path): string
    {
        return '/' . ltrim($path, '/');
    }

    /**
     * Get image URL
     */
    public static function image(string $path): string
    {
        return self::asset(Config::get('paths.images') . '/' . $path);
    }

    /**
     * Get site config value
     */
    public static function config(string $key, mixed $default = null): mixed
    {
        return Config::get($key, $default);
    }
}

