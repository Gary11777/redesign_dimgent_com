<?php

declare(strict_types=1);

/**
 * reCAPTCHA v3 Validator
 */
class Recaptcha
{
    private string $secretKey;
    private string $apiEndpoint = 'https://www.google.com/recaptcha/api/siteverify';

    public function __construct()
    {
        $configFile = Config::get('recaptcha.config_file', 'config/recaptcha.json');
        if (!file_exists($configFile)) {
            throw new RuntimeException('reCAPTCHA configuration file not found.');
        }

        $config = json_decode(file_get_contents($configFile), true);
        if (!is_array($config) || empty($config['secret_key'])) {
            throw new RuntimeException('reCAPTCHA secret key is not configured.');
        }

        $this->secretKey = $config['secret_key'];
    }

    /**
     * Verify reCAPTCHA token
     */
    public function verify(string $token, string $remoteIp = ''): bool
    {
        if ($token === '') {
            return false;
        }

        $payload = http_build_query([
            'secret' => $this->secretKey,
            'response' => $token,
            'remoteip' => $remoteIp ?: Security::getClientIp(),
        ]);

        $context = stream_context_create([
            'http' => [
                'method' => 'POST',
                'header' => "Content-type: application/x-www-form-urlencoded\r\n",
                'content' => $payload,
                'timeout' => 10,
            ],
        ]);

        $response = @file_get_contents($this->apiEndpoint, false, $context);
        if ($response === false) {
            return false;
        }

        $result = json_decode($response, true);
        if (!is_array($result) || empty($result['success'])) {
            return false;
        }

        return ($result['score'] ?? 0) >= 0.5;
    }

    public static function getSiteKey(): string
    {
        $configFile = Config::get('recaptcha.config_file', 'config/recaptcha.json');
        if (!file_exists($configFile)) {
            return '';
        }

        $config = json_decode(file_get_contents($configFile), true);
        return $config['site_key'] ?? '';
    }
}
