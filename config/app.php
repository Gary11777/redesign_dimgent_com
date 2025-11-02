<?php
/**
 * Application Configuration
 * Core settings for the Dimgent Technologies website
 */

return [
    'name' => 'Dimgent Technologies',
    'tagline' => 'Electronics Development',
    'description' => 'Development of customized electronic devices, electrical equipment and devices. Full cycle of development (from mock-up to finished product).',
    
    'url' => 'http://localhost',
    'environment' => 'development', // development, production
    
    'location' => 'Minsk, Belarus',
    
    // Contact information
    'email' => 'info@dimgent.com', // Replace with actual email
    
    // Language settings
    'languages' => [
        'en' => [
            'name' => 'English',
            'url' => 'http://www.dimgent.com'
        ],
        'pl' => [
            'name' => 'Polski',
            'url' => 'http://www.dimgent.pl'
        ],
        'ru' => [
            'name' => 'Русский(ru)',
            'url' => 'http://www.dimgent.ru'
        ],
        'by' => [
            'name' => 'Русский(by)',
            'url' => 'http://www.dimgent.by'
        ]
    ],
    
    // Navigation menu
    'menu' => [
        ['name' => 'Home', 'url' => '/'],
        ['name' => 'Products', 'url' => '/products.php'],
        ['name' => 'Services', 'url' => '/services.php'],
        ['name' => 'Projects', 'url' => '/projects.php'],
        ['name' => 'Contacts', 'url' => '/contacts.php'],
        ['name' => 'About Us', 'url' => '/about.php']
    ]
];
