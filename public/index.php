<?php

declare(strict_types=1);

// Define path constants
define('ROOT_PATH', dirname(__DIR__));
define('APP_PATH', ROOT_PATH . '/app');
define('CONFIG_PATH', ROOT_PATH . '/config');
define('PUBLIC_PATH', ROOT_PATH . '/public');
define('CACHE_PATH', ROOT_PATH . '/cache');

// Start session with secure settings
ini_set('session.cookie_httponly', '1');
ini_set('session.use_only_cookies', '1');
ini_set('session.cookie_samesite', 'Strict');

session_save_path(CACHE_PATH . '/sessions');
session_start();

// Autoload Composer dependencies
require_once ROOT_PATH . '/vendor/autoload.php';

// Autoload application classes
spl_autoload_register(function ($class) {
    $class = str_replace('\\', '/', $class);
    $file = APP_PATH . '/' . $class . '.php';
    
    if (file_exists($file)) {
        require_once $file;
    }
});

// Initialize router
$router = new Core\Router();

// Define routes
$router->get('/', [Controllers\HomeController::class, 'index']);
$router->get('/products', [Controllers\ProductsController::class, 'index']);
$router->get('/services', [Controllers\ServicesController::class, 'index']);
$router->get('/projects', [Controllers\ProjectsController::class, 'index']);
$router->get('/contacts', [Controllers\ContactsController::class, 'index']);
$router->post('/contacts', [Controllers\ContactsController::class, 'submit']);
$router->get('/about', [Controllers\AboutController::class, 'index']);

// Dispatch request
$router->dispatch();
