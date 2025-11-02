<?php
/**
 * Mail Configuration
 * SMTP settings for PHPMailer
 */

return [
    'smtp' => [
        'host' => getenv('SMTP_HOST') ?: 'smtp.example.com',
        'port' => getenv('SMTP_PORT') ?: 587,
        'username' => getenv('SMTP_USERNAME') ?: 'your-email@example.com',
        'password' => getenv('SMTP_PASSWORD') ?: 'your-password',
        'encryption' => getenv('SMTP_ENCRYPTION') ?: 'tls', // tls or ssl
        'from_email' => getenv('SMTP_FROM_EMAIL') ?: 'noreply@dimgent.com',
        'from_name' => getenv('SMTP_FROM_NAME') ?: 'Dimgent Technologies'
    ],
    
    // Email recipient for contact form
    'contact_recipient' => getenv('CONTACT_EMAIL') ?: 'info@dimgent.com',
    
    // Email templates
    'templates' => [
        'contact_form' => 'Contact Form Submission'
    ]
];
