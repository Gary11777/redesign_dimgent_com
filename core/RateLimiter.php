<?php

declare(strict_types=1);

/**
 * Rate Limiter
 *
 * Implements rate limiting to prevent abuse
 */
class RateLimiter
{
    private string $storageDir;

    public function __construct()
    {
        $cacheDir = Config::get('paths.cache', 'cache');
        $this->storageDir = rtrim($cacheDir, DIRECTORY_SEPARATOR) . DIRECTORY_SEPARATOR . 'rate_limit';

        if (!is_dir($this->storageDir)) {
            mkdir($this->storageDir, 0755, true);
        }
    }

    /**
     * Check whether the given IP is allowed to perform an action
     */
    public function isAllowed(string $ip, int $maxAttempts = 3, int $timeWindow = 3600): bool
    {
        if (!Config::get('security.rate_limit.enabled', true)) {
            return true;
        }

        $maxAttempts = Config::get('security.rate_limit.max_attempts', $maxAttempts);
        $timeWindow = Config::get('security.rate_limit.time_window', $timeWindow);

        $record = $this->getRecord($ip);

        if ($record === null) {
            $this->saveRecord($ip, 1, time());
            return true;
        }

        if (time() - $record['first_attempt'] > $timeWindow) {
            $this->saveRecord($ip, 1, time());
            return true;
        }

        if ($record['attempts'] >= $maxAttempts) {
            return false;
        }

        $this->saveRecord($ip, $record['attempts'] + 1, $record['first_attempt']);
        return true;
    }

    /**
     * Get remaining attempts
     */
    public function getRemainingAttempts(string $ip, int $maxAttempts = 3): int
    {
        $maxAttempts = Config::get('security.rate_limit.max_attempts', $maxAttempts);
        $record = $this->getRecord($ip);
        if ($record === null) {
            return $maxAttempts;
        }

        return max(0, $maxAttempts - $record['attempts']);
    }

    /**
     * Fetch record from storage
     */
    private function getRecord(string $ip): ?array
    {
        $file = $this->storageDir . DIRECTORY_SEPARATOR . md5($ip) . '.json';
        if (!file_exists($file)) {
            return null;
        }

        $data = json_decode(file_get_contents($file), true);
        if (!is_array($data)) {
            return null;
        }

        return $data;
    }

    /**
     * Save record to storage
     */
    private function saveRecord(string $ip, int $attempts, int $firstAttempt): void
    {
        $file = $this->storageDir . DIRECTORY_SEPARATOR . md5($ip) . '.json';
        $data = [
            'ip' => $ip,
            'attempts' => $attempts,
            'first_attempt' => $firstAttempt,
            'last_attempt' => time(),
        ];

        file_put_contents($file, json_encode($data));
    }
}
