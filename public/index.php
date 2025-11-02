<?php
/**
 * Front Controller - Entry point for all requests
 * 
 * This file initializes the application and routes all requests
 */

declare(strict_types=1);

// Define paths
define('ROOT_PATH', dirname(__DIR__));
define('APP_PATH', ROOT_PATH . '/app');
define('CONFIG_PATH', ROOT_PATH . '/config');
define('PUBLIC_PATH', ROOT_PATH . '/public');

// Autoloader
require_once ROOT_PATH . '/vendor/autoload.php';

// Start session
session_start();

// Load configuration
$config = require CONFIG_PATH . '/app.php';

// Initialize application
$app = new \App\Core\Application($config);

// Run the application
$app->run();
