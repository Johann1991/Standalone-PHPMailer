<?php
// controllers/EmailController.php

require __DIR__ . '/../models/EmailModel.php'; // Adjust this path as needed
require __DIR__ . '/../utils/logger.php'; // Adjust this path as needed

class EmailController {
    /**
     * Send an email using the EmailModel
     *
     * @return void
     */
    public function sendEmail() {
        $emailModel = new EmailModel(); // Initialize EmailModel
        $status = $emailModel->send(); // Send the email and capture the status
        
        // Check the status to determine what to output or log
        if ($status) {
            header('Location: /standalone_phpmailer/public/?status=success'); // Adjust this path as needed
            exit;
        } else {
            $errorMessage = "We couldn't send your email. Please try again later.";
            log_error($errorMessage);
            header('Location: /standalone_phpmailer/public/?status=failure'); // Adjust this path as needed
            exit;
        }        
    }
}
?>