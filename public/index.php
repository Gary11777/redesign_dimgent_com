<?php
/**
 * Entry Point for Dimgent Technologies Website
 * PHP 8.4 MVC Application
 */

declare(strict_types=1);

// Define base paths
define('ROOT_PATH', dirname(__DIR__));
define('APP_PATH', ROOT_PATH . '/app');
define('CONFIG_PATH', ROOT_PATH . '/config');
define('PUBLIC_PATH', ROOT_PATH . '/public');

// Autoloader
spl_autoload_register(function ($class) {
    $file = APP_PATH . '/' . str_replace('\\', '/', $class) . '.php';
    if (file_exists($file)) {
        require_once $file;
    }
});

// Load configuration
$config = json_decode(file_get_contents(CONFIG_PATH . '/app.json'), true);

// Initialize router
$router = new Core\Router($config);

// Define routes
$router->get('/', 'Controllers\HomeController@index');
$router->get('/home', 'Controllers\HomeController@index');
$router->get('/products', 'Controllers\ProductsController@index');
$router->get('/services', 'Controllers\ServicesController@index');
$router->get('/projects', 'Controllers\ProjectsController@index');
$router->get('/contacts', 'Controllers\ContactsController@index');
$router->get('/about', 'Controllers\AboutController@index');

// Dispatch request
$router->dispatch();
