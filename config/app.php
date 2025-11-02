<?php
/**
 * Application Configuration
 * 
 * Main configuration file for the application
 */

return [
    'app' => [
        'name' => 'Dimgent Technologies',
        'url' => 'http://localhost',
        'env' => 'development', // development, production
        'debug' => true,
        'timezone' => 'Europe/Minsk',
    ],

    'site' => [
        'title' => 'Dimgent Technologies - Electronics Development',
        'description' => 'Development of customized electronic devices, electrical equipment and devices. Full cycle of development (from mock-up to finished product).',
        'keywords' => 'developing hardware devices, designing circuit boards, developing customized electronic devices, electric circuits, developing electronic equipment',
        'email' => 'info@dimgent.com',
        'phone' => '+48 57 702 83 35',
        'location' => 'Minsk, Belarus',
        'ga_tracking_id' => 'UA-77722463-1',
    ],

    'languages' => [
        'en' => [
            'name' => 'english',
            'url' => 'http://www.dimgent.com/',
        ],
        'pl' => [
            'name' => 'polska',
            'url' => 'http://www.dimgent.pl/',
        ],
        'ru' => [
            'name' => 'русский(ru)',
            'url' => 'http://www.dimgent.ru/',
        ],
        'by' => [
            'name' => 'русский(by)',
            'url' => 'http://www.dimgent.by/',
        ],
    ],

    'routes' => [
        '' => 'HomeController@index',
        'products' => 'ProductsController@index',
        'services' => 'ServicesController@index',
        'projects' => 'ProjectsController@index',
        'contacts' => 'ContactsController@index',
        'about' => 'AboutController@index',
        'contact/send' => 'ContactsController@send',
    ],

    'mail' => [
        'smtp_host' => 'smtp.gmail.com',
        'smtp_port' => 587,
        'smtp_username' => '', // Set in .env or config
        'smtp_password' => '', // Set in .env or config
        'smtp_encryption' => 'tls',
        'from_email' => 'noreply@dimgent.com',
        'from_name' => 'Dimgent Technologies',
        'to_email' => 'info@dimgent.com',
        'to_name' => 'Dimgent Technologies',
    ],

    'recaptcha' => [
        'site_key' => '', // Add your reCAPTCHA v3 site key
        'secret_key' => '', // Add your reCAPTCHA v3 secret key
        'min_score' => 0.5,
    ],

    'menu' => [
        [
            'title' => 'Home',
            'url' => '/',
            'active' => 'home',
        ],
        [
            'title' => 'Products',
            'url' => '/products',
            'active' => 'products',
        ],
        [
            'title' => 'Services',
            'url' => '/services',
            'active' => 'services',
        ],
        [
            'title' => 'Projects',
            'url' => '/projects',
            'active' => 'projects',
        ],
        [
            'title' => 'Contacts',
            'url' => '/contacts',
            'active' => 'contacts',
        ],
        [
            'title' => 'About Us',
            'url' => '/about',
            'active' => 'about',
        ],
    ],
];
