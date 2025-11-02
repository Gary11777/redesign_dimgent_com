<?php
/**
 * Home Page Entry Point
 */

// Bootstrap the application
require_once __DIR__ . '/../includes/bootstrap.php';
require_once __DIR__ . '/../controllers/HomeController.php';

// Initialize and run controller
$controller = new HomeController();
$controller->index();
