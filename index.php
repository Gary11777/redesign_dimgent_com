<?php

declare(strict_types=1);

/**
 * Application entry point
 */

// Strict error reporting in development (consider adjusting for production)
error_reporting(E_ALL);
ini_set('display_errors', '1');

require_once __DIR__ . '/core/Config.php';
require_once __DIR__ . '/core/Security.php';

Config::load();

session_name(Config::get('security.session_name', 'DIMGENT_SESSION'));
session_start();

require_once __DIR__ . '/vendor/autoload.php';
require_once __DIR__ . '/core/BaseController.php';
require_once __DIR__ . '/core/Router.php';
require_once __DIR__ . '/core/RateLimiter.php';
require_once __DIR__ . '/core/Mailer.php';
require_once __DIR__ . '/core/Recaptcha.php';

$router = new Router();

$router->get('/', 'Home', 'index');
$router->get('/products', 'Products', 'index');
$router->get('/services', 'Services', 'index');
$router->get('/projects', 'Projects', 'index');
$router->get('/contacts', 'Contacts', 'index');
$router->get('/about', 'About', 'index');

$router->post('/contacts', 'Contacts', 'submit');

$router->dispatch();
