<?php
// index.php
//define('APP_ROOT', __DIR__);

// Include the Composer autoloader
require_once '../vendor/autoload.php';

// Include the router
require '../router.php';

// Load .env file
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/../config');
$dotenv->load();
?>