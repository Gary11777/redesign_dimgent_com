<?php

declare(strict_types=1);

/**
 * reCAPTCHA v3 Validator
 * 
 * Validates Google reCAPTCHA v3 tokens
 */
class Recaptcha
{
    private string $secretKey;
    private string $apiUrl = 'https://www.google.com/recaptcha/api/siteverify';

    public function __construct()
    {
        // Load reCAPTCHA configuration
        $configFile = Config::get('recaptcha.config_file', 'config/recaptcha.json');
        
        if (!file_exists($configFile)) {
            throw new Exception('reCAPTCHA configuration file not found');
        }

        $config = json_decode(file_get_contents($configFile), true);
        
        if ($config === null || empty($config['secret_key'])) {
            throw new Exception('reCAPTCHA secret key not configured');
        }

        $this->secretKey = $config['secret_key'];
    }

    /**
     * Verify reCAPTCHA token
     */
    public function verify(string $token, string $remoteIp = ''): bool
    {
        if (empty($token)) {
            return false;
        }

        $data = [
            'secret' => $this->secretKey,
            'response' => $token,
            'remoteip' => $remoteIp ?: Security::getClientIp()
        ];

        $options = [
            'http' => [
                'header' => "Content-type: application/x-www-form-urlencoded\r\n",
                'method' => 'POST',
                'content' => http_build_query($data),
                'timeout' => 10
            ]
        ];

        $context = stream_context_create($options);
        $result = @file_get_contents($this->apiUrl, false, $context);
        
        if ($result === false) {
            return false;
        }

        $response = json_decode($result, true);

        return isset($response['success']) && 
               $response['success'] === true && 
               isset($response['score']) && 
               $response['score'] >= 0.5;
    }

    /**
     * Get site key for frontend
     */
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

