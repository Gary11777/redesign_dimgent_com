<?php
/**
 * ReCaptcha Helper Class
 * 
 * Handles Google reCAPTCHA v3 verification
 */

declare(strict_types=1);

namespace App\Helpers;

class ReCaptcha
{
    private string $secretKey;
    private float $minScore;

    /**
     * Constructor
     */
    public function __construct(string $secretKey, float $minScore = 0.5)
    {
        $this->secretKey = $secretKey;
        $this->minScore = $minScore;
    }

    /**
     * Verify reCAPTCHA token
     */
    public function verify(string $token, string $action = 'contact'): array
    {
        if (empty($this->secretKey)) {
            return [
                'success' => false,
                'error' => 'ReCAPTCHA not configured'
            ];
        }

        // Prepare request data
        $data = [
            'secret' => $this->secretKey,
            'response' => $token,
            'remoteip' => $_SERVER['REMOTE_ADDR'] ?? ''
        ];

        // Make request to Google reCAPTCHA API
        $options = [
            'http' => [
                'header' => "Content-type: application/x-www-form-urlencoded\r\n",
                'method' => 'POST',
                'content' => http_build_query($data)
            ]
        ];

        $context = stream_context_create($options);
        $response = file_get_contents(
            'https://www.google.com/recaptcha/api/siteverify',
            false,
            $context
        );

        if ($response === false) {
            return [
                'success' => false,
                'error' => 'Failed to verify reCAPTCHA'
            ];
        }

        $result = json_decode($response, true);

        // Check if verification was successful
        if (!$result['success']) {
            return [
                'success' => false,
                'error' => 'ReCAPTCHA verification failed',
                'error_codes' => $result['error-codes'] ?? []
            ];
        }

        // Check score
        $score = $result['score'] ?? 0;
        if ($score < $this->minScore) {
            return [
                'success' => false,
                'error' => 'ReCAPTCHA score too low',
                'score' => $score
            ];
        }

        // Check action
        if (isset($result['action']) && $result['action'] !== $action) {
            return [
                'success' => false,
                'error' => 'ReCAPTCHA action mismatch'
            ];
        }

        return [
            'success' => true,
            'score' => $score,
            'action' => $result['action'] ?? '',
            'challenge_ts' => $result['challenge_ts'] ?? ''
        ];
    }
}
