<?php

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
        $this->secretKey = Config::get('recaptcha.secret_key');
        
        if (empty($this->secretKey)) {
            throw new Exception('reCAPTCHA secret key not configured');
        }
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
            'remoteip' => $remoteIp ?: $_SERVER['REMOTE_ADDR'] ?? ''
        ];

        $options = [
            'http' => [
                'header' => "Content-type: application/x-www-form-urlencoded\r\n",
                'method' => 'POST',
                'content' => http_build_query($data)
            ]
        ];

        $context = stream_context_create($options);
        $result = file_get_contents($this->apiUrl, false, $context);
        
        if ($result === false) {
            return false;
        }

        $response = json_decode($result, true);

        return isset($response['success']) && $response['success'] === true && 
               isset($response['score']) && $response['score'] >= 0.5;
    }

    /**
     * Get site key for frontend
     */
    public static function getSiteKey(): string
    {
        return Config::get('recaptcha.site_key', '');
    }
}

