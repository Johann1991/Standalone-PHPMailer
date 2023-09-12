<?php
// controllers/EmailController.php

require __DIR__ . '/../models/EmailModel.php';
require __DIR__ . '/../utils/logger.php';

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
            header('Location: /standalone_phpmailer/public/?status=success'); // Redirect to the correct path
            exit;
        } else {
            $errorMessage = "We couldn't send your email. Please try again later.";
            log_error($errorMessage);
            header('Location: /standalone_phpmailer/public/?status=failure'); // Redirect to the correct path
            exit;
        }        
    }
}
?>