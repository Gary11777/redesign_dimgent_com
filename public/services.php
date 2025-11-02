<?php
/**
 * Services Page Entry Point
 */

// Bootstrap the application
require_once __DIR__ . '/../includes/bootstrap.php';
require_once __DIR__ . '/../controllers/ServicesController.php';

// Initialize and run controller
$controller = new ServicesController();
$controller->index();
