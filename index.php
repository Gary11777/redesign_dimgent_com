<?php

/**
 * Entry Point
 * 
 * Bootstrap file that initializes the application
 */

// Error reporting (disable in production)
error_reporting(E_ALL);
ini_set('display_errors', '1');

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

// Load base classes first
require_once 'core/BaseController.php';
require_once 'core/View.php';
require_once 'core/Input.php';

// Load configuration
require_once 'core/Config.php';
Config::load();

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

