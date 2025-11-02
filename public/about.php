<?php
/**
 * About Page Entry Point
 */

// Bootstrap the application
require_once __DIR__ . '/../includes/bootstrap.php';
require_once __DIR__ . '/../controllers/AboutController.php';

// Initialize and run controller
$controller = new AboutController();
$controller->index();
