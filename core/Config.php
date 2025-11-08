<?php

declare(strict_types=1);

/**
 * Configuration Manager
 *
 * Loads and manages JSON-based configuration
 */
class Config
{
    private static ?array $config = null;

    /**
     * Load configuration from JSON file
     */
    public static function load(string $configPath = 'config/config.json'): void
    {
        if (self::$config !== null) {
            return;
        }

        if (!file_exists($configPath)) {
            throw new RuntimeException("Configuration file not found: {$configPath}");
        }

        $jsonContent = file_get_contents($configPath);
        $config = json_decode($jsonContent, true);

        if (json_last_error() !== JSON_ERROR_NONE) {
            throw new RuntimeException('Invalid JSON in configuration file: ' . json_last_error_msg());
        }

        self::$config = $config;
    }

    /**
     * Get configuration value using dot notation
     * Example: Config::get('site.name')
     */
    public static function get(string $key, mixed $default = null): mixed
    {
        if (self::$config === null) {
            self::load();
        }

        $keys = explode('.', $key);
        $value = self::$config;

        foreach ($keys as $segment) {
            if (!is_array($value) || !array_key_exists($segment, $value)) {
                return $default;
            }
            $value = $value[$segment];
        }

        return $value;
    }

    /**
     * Get entire configuration array
     */
    public static function all(): array
    {
        if (self::$config === null) {
            self::load();
        }

        return self::$config ?? [];
    }
}
