<?php

require __DIR__ . '/../vendor/autoload.php';

// Fetching files
// require '../vendor/PHPMailer/src/PHPMailer.php';
// require 'path/to/PHPMailer/src/SMTP.php';
// require 'path/to/PHPMailer/src/Exception.php';

// models/EmailModel.php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class EmailModel {
    
    /**
     * Configures and returns an instance of PHPMailer
     *
     * @return PHPMailer The configured PHPMailer instance
     */
    private function get_configured_mailer() {
        $mail = new PHPMailer(true);
        // Configuration details fetched directly from .env file
        $host = getenv('SMTP_HOST');
        $user = getenv('SMTP_USER');
        $pass = getenv('SMTP_PASS');

        // Configure the mailer
        $mail->isSMTP();
        $mail->Host = $host;
        $mail->SMTPAuth = true;
        $mail->Username = $user;
        $mail->Password = $pass;

        return $mail;
    }
    
    /**
     * Send an email
     *
     * @return bool True if email is sent, false otherwise
     */
    public function send() {
        $name = $_POST['name'] ?? null;
        $email = $_POST['email'] ?? null;
        $subject = $_POST['subject'] ?? null;
        $message = $_POST['message'] ?? null;

        $mail = $this->get_configured_mailer(); // Use the new method here
    
        try {
            $toEmail = getenv('TO_EMAIL');
            $mail->addAddress($toEmail);
            $mail->Subject = $subject;
    
            // Build the email body
            $bodyContent = "Name: $name<br>";
            $bodyContent .= "Email: $email<br>";
            $bodyContent .= "Message: <br>$message";

            $mail->Body = $bodyContent;
            $mail->isHTML(true); // Set email format to HTML
            
            $mail->AltBody = "Message: <br>$message";
    
            // Optionally specify a "From" address, if it's different from the SMTP username
            $fromEmail = getenv('FROM_EMAIL') ?? $mail->Username;
            $mail->setFrom($fromEmail, 'Mailer'); // Replace 'Mailer' with the sender's name if you want
    
            // Actually send the email
            $mail->send();
    
            return true;
        } catch (Exception $e) {
            log_error($e->getMessage()); // Log any exceptions
            return false;
        }
    }
    
}
?>
