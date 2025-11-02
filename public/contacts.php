<?php
/**
 * Contacts Page Entry Point
 */

// Bootstrap the application
require_once __DIR__ . '/../includes/bootstrap.php';
require_once __DIR__ . '/../controllers/ContactsController.php';

// Initialize and run controller
$controller = new ContactsController();
$controller->index();
