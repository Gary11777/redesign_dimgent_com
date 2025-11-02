<?php
/**
 * Projects Page Entry Point
 */

// Bootstrap the application
require_once __DIR__ . '/../includes/bootstrap.php';
require_once __DIR__ . '/../controllers/ProjectsController.php';

// Initialize and run controller
$controller = new ProjectsController();
$controller->index();
