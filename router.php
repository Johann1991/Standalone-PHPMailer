<?php
// router.php
require 'vendor/autoload.php';
use Dotenv\Dotenv;

try {
    $dotenv = Dotenv::createUnsafeImmutable(__DIR__ . '/config');
    $dotenv->load();
} catch (Exception $e) {
    echo 'Could not load .env: ' . $e->getMessage();
}

$uri = trim(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH), '/');
$uri = str_replace('standalone_phpmailer/public', '', $uri); // Adjust this path as needed
$uri = ltrim($uri, '/');

// Check for the request method (GET or POST)
$requestMethod = $_SERVER['REQUEST_METHOD'];

switch ($uri) {
    case '':
        case '/':
            require 'views/contact-form.php'; // Adjust this path as needed
            break;
    case 'standalone_phpmailer/router.php/send-email': // Adjust this path as needed
        if ($requestMethod === 'POST') {
            require './controllers/EmailController.php'; // Adjust this path as needed
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
         require 'views/404.php'; // Adjust this path as needed
         break;
}
?>