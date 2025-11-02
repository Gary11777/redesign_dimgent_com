<?php
/**
 * Google reCAPTCHA Configuration
 * reCAPTCHA v3 settings for spam protection
 */

return [
    'site_key' => getenv('RECAPTCHA_SITE_KEY') ?: 'your-site-key-here',
    'secret_key' => getenv('RECAPTCHA_SECRET_KEY') ?: 'your-secret-key-here',
    'verify_url' => 'https://www.google.com/recaptcha/api/siteverify',
    'score_threshold' => 0.5 // Minimum score to accept (0.0 - 1.0)
];
