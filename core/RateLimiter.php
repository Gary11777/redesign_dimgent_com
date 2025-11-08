<?php

declare(strict_types=1);

/**
 * Rate Limiter
 * 
 * Implements rate limiting to prevent abuse
 */
class RateLimiter
{
    private string $cacheDir;

    public function __construct()
    {
        $this->cacheDir = Config::get('paths.cache', 'cache') . '/rate_limit';
        
        if (!is_dir($this->cacheDir)) {
            mkdir($this->cacheDir, 0755, true);
        }
    }

    /**
     * Check if IP is rate limited
     */
    public function isAllowed(string $ip, int $maxAttempts = 3, int $timeWindow = 3600): bool
    {
        if (!Config::get('security.rate_limit.enabled', true)) {
            return true;
        }

        $maxAttempts = Config::get('security.rate_limit.max_attempts', $maxAttempts);
        $timeWindow = Config::get('security.rate_limit.time_window', $timeWindow);

        $file = $this->cacheDir . '/' . md5($ip) . '.json';
        
        if (!file_exists($file)) {
            $this->recordAttempt($ip);
            return true;
        }

        $data = json_decode(file_get_contents($file), true);
        
        if ($data === null) {
            $this->recordAttempt($ip);
            return true;
        }

        // Check if time window has passed
        if (time() - $data['first_attempt'] > $timeWindow) {
            $this->recordAttempt($ip);
            return true;
        }

        // Check if max attempts exceeded
        if ($data['attempts'] >= $maxAttempts) {
            return false;
        }

        $this->recordAttempt($ip);
        return true;
    }

    /**
     * Record an attempt
     */
    private function recordAttempt(string $ip): void
    {
        $file = $this->cacheDir . '/' . md5($ip) . '.json';
        
        $data = [
            'ip' => $ip,
            'attempts' => 1,
            'first_attempt' => time(),
            'last_attempt' => time()
        ];

        if (file_exists($file)) {
            $existing = json_decode(file_get_contents($file), true);
            if ($existing !== null) {
                $data['attempts'] = $existing['attempts'] + 1;
                $data['first_attempt'] = $existing['first_attempt'];
            }
        }

        file_put_contents($file, json_encode($data));
    }

    /**
     * Get remaining attempts
     */
    public function getRemainingAttempts(string $ip, int $maxAttempts = 3): int
    {
        $file = $this->cacheDir . '/' . md5($ip) . '.json';
        
        if (!file_exists($file)) {
            return $maxAttempts;
        }

        $data = json_decode(file_get_contents($file), true);
        
        if ($data === null) {
            return $maxAttempts;
        }

        $maxAttempts = Config::get('security.rate_limit.max_attempts', $maxAttempts);
        $remaining = $maxAttempts - $data['attempts'];
        
        return max(0, $remaining);
    }
}

