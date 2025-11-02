<?php
/**
 * Products Page Entry Point
 */

// Bootstrap the application
require_once __DIR__ . '/../includes/bootstrap.php';
require_once __DIR__ . '/../controllers/ProductsController.php';

// Initialize and run controller
$controller = new ProductsController();
$controller->index();
