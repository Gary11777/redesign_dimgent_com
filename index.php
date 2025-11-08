<?php

declare(strict_types=1);

/**
 * Entry Point
 * 
 * Bootstrap file that initializes the application
 */

// Error reporting (disable in production)
error_reporting(E_ALL);
ini_set('display_errors', '1');

// Load base classes first
require_once 'core/Config.php';
require_once 'core/Security.php';

// Load configuration
Config::load();

// Start session
session_name(Config::get('security.session_name', 'DIMGENT_SESSION'));
session_start();

// Autoloader
spl_autoload_register(function ($class) {
    $paths = [
        'core/',
        'controllers/',
        'models/',
    ];

    foreach ($paths as $path) {
        $file = $path . $class . '.php';
        if (file_exists($file)) {
            require_once $file;
            return;
        }
    }
});

// Load Composer autoloader
require_once __DIR__ . '/vendor/autoload.php';

// Load remaining base classes
require_once 'core/BaseController.php';

// Initialize router
require_once 'core/Router.php';
$router = new Router();

// Define routes
$router->get('/', 'Home', 'index');
$router->get('/products', 'Products', 'index');
$router->get('/services', 'Services', 'index');
$router->get('/projects', 'Projects', 'index');
$router->get('/contacts', 'Contacts', 'index');
$router->get('/about', 'About', 'index');

// Contact form submission
$router->post('/contacts', 'Contacts', 'submit');

// Dispatch request
$router->dispatch();

