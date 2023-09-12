<?php
// utils/logger.php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

define('LOG_FILE_PATH', getenv('LOG_FILE_PATH') ?? './logs/email_errors.log');
define('BACKUP_LOG_FILE_PATH', './logs/backup_email_errors.log');
define('ADMIN_EMAIL', getenv('ADMIN_EMAIL') ?? 'admin@example.com'); // Add an admin email here

/**
 * Logs error messages to a file
 *
 * @param string $message The error message to log
 */
function log_error($message) {
    $timestamp = date('Y-m-d H:i:s');
    $logEntry = "[{$timestamp}] - {$message}" . PHP_EOL;

    // Attempt to write the log entry to the primary log file
    $writeSuccess = file_put_contents(LOG_FILE_PATH, $logEntry, FILE_APPEND);

    // Check if writing to the primary log was successful
    if ($writeSuccess === false) {
        // Writing to the primary log failed; try writing to the backup log
        $backupWriteSuccess = file_put_contents(BACKUP_LOG_FILE_PATH, $logEntry, FILE_APPEND);

        // Check if writing to the backup log was successful
        if ($backupWriteSuccess === false) {
            // Notify admin if both primary and backup logs fail
            notify_admin("Logging failed for message: {$message}");
        }
    }
}


/**
 * Notifies the admin by email if logging fails
 *
 * @param string $errorMsg The error message to send
 */
function notify_admin($errorMsg) {
    $mail = new PHPMailer(true);
    try {
        $mail->isSMTP();
        $mail->Host = getenv('SMTP_HOST');
        $mail->SMTPAuth = true;
        $mail->Username = getenv('SMTP_USER');
        $mail->Password = getenv('SMTP_PASS');
        $mail->addAddress(ADMIN_EMAIL);
        $mail->isHTML(true);
        $mail->Subject = 'Logging Failed';
        $mail->Body = "Logging failed for the following message: <br> {$errorMsg}";
        $mail->send();
    } catch (Exception $e) {
        // Logging is broken, and email failed. Extreme measures could go here.
    }
}
?>