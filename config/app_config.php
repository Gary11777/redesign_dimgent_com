<?php
/**
 * Application Configuration
 * Core settings for the Dimgent Technologies website
 */

return [
    // Site Information
    'site_name' => 'Dimgent Technologies',
    'site_tagline' => 'Electronics Development',
    'site_description' => 'Development of customized electronic devices, electrical equipment and devices. Full cycle of development (from mock-up to finished product).',
    
    // Contact Information
    'contact' => [
        'email' => 'info@dimgent.com', // Replace with actual email
        'location' => 'Minsk, Belarus',
        'development_center' => 'Minsk, Belarus',
    ],
    
    // Social Media (Optional)
    'social' => [
        // Add social media links if needed
    ],
    
    // Google reCAPTCHA v3
    'recaptcha' => [
        'site_key' => 'YOUR_RECAPTCHA_SITE_KEY', // Replace with your site key
        'secret_key' => 'YOUR_RECAPTCHA_SECRET_KEY', // Replace with your secret key
    ],
    
    // Paths
    'base_url' => '', // Set this to your domain, e.g., 'https://dimgent.com'
    'assets_url' => '/assets',
    
    // Company Statistics
    'stats' => [
        'years_experience' => '20+',
        'projects_completed' => '50+',
    ],
];
