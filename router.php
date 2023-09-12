<?php
// router.php
// At the top of router.php or your bootstrap file
require 'vendor/autoload.php'; // make sure to include this if not already included
use Dotenv\Dotenv;

try {
    $dotenv = Dotenv::createUnsafeImmutable(__DIR__ . '/config');
    $dotenv->load();
} catch (Exception $e) {
    echo 'Could not load .env: ' . $e->getMessage();
}

$uri = trim(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH), '/');
$uri = str_replace('standalone_phpmailer/public', '', $uri); // Adjust this path as needed
$uri = ltrim($uri, '/');  // Remove any leading slashes

// Check for the request method (GET or POST)
$requestMethod = $_SERVER['REQUEST_METHOD'];

switch ($uri) {
    case '':
        case '/':
            require 'views/contact-form.php';
            break;
    case 'standalone_phpmailer/router.php/send-email':
        if ($requestMethod === 'POST') {
            require './controllers/EmailController.php';
            $emailController = new EmailController();
            $emailController->sendEmail();
            echo 'email controller envoked';
        }
        break;
    // 404 - Not Found case
    default:
        // Send HTTP 404 header
         header('HTTP/1.1 404 Not Found');
        
         // Include the 404 view
         require 'views/404.php';
         break;
}
?>