<?php

declare(strict_types=1);

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

/**
 * Mailer
 * 
 * Handles email sending using PHPMailer with SMTP
 * Includes email injection prevention
 */
class Mailer
{
    private PHPMailer $mailer;
    private array $config;

    public function __construct()
    {
        // Load PHPMailer
        $autoloadPath = __DIR__ . '/../vendor/autoload.php';
        
        if (!file_exists($autoloadPath)) {
            throw new Exception('PHPMailer is not installed. Please run "composer install"');
        }

        require_once $autoloadPath;

        if (!class_exists('PHPMailer\PHPMailer\PHPMailer')) {
            throw new Exception('PHPMailer class not found');
        }

        // Load mail configuration
        $configFile = Config::get('mail.config_file', 'config/mail.json');
        if (!file_exists($configFile)) {
            throw new Exception('Mail configuration file not found');
        }

        $this->config = json_decode(file_get_contents($configFile), true);
        if ($this->config === null) {
            throw new Exception('Invalid mail configuration');
        }

        $this->mailer = new PHPMailer(true);
        $this->configure();
    }

    /**
     * Configure PHPMailer with SMTP settings
     */
    private function configure(): void
    {
        $this->mailer->isSMTP();
        $this->mailer->Host = $this->config['host'] ?? '';
        $this->mailer->SMTPAuth = true;
        $this->mailer->Username = $this->config['username'] ?? '';
        $this->mailer->Password = $this->config['password'] ?? '';
        $this->mailer->SMTPSecure = $this->config['encryption'] ?? 'tls';
        $this->mailer->Port = $this->config['port'] ?? 587;
        $this->mailer->CharSet = 'UTF-8';
        
        // Prevent email injection - sanitize headers
        $fromEmail = $this->sanitizeEmail($this->config['from_email'] ?? '');
        $fromName = $this->sanitizeHeader($this->config['from_name'] ?? '');
        
        $this->mailer->setFrom($fromEmail, $fromName);
    }

    /**
     * Sanitize email address to prevent injection
     */
    private function sanitizeEmail(string $email): string
    {
        // Remove any newlines, carriage returns, or null bytes
        $email = str_replace(["\r", "\n", "\0"], '', $email);
        
        // Validate email format
        $email = filter_var($email, FILTER_SANITIZE_EMAIL);
        
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            throw new Exception('Invalid email address');
        }
        
        return $email;
    }

    /**
     * Sanitize header to prevent injection
     */
    private function sanitizeHeader(string $header): string
    {
        // Remove newlines and carriage returns
        $header = str_replace(["\r", "\n"], '', $header);
        
        // Remove any control characters
        $header = preg_replace('/[\x00-\x1F\x7F]/', '', $header);
        
        return $header;
    }

    /**
     * Send email
     */
    public function send(string $to, string $subject, string $body, bool $isHTML = false): bool
    {
        try {
            $this->mailer->clearAddresses();
            
            // Sanitize recipient email
            $to = $this->sanitizeEmail($to);
            $this->mailer->addAddress($to);
            
            // Sanitize subject
            $subject = $this->sanitizeHeader($subject);
            $this->mailer->Subject = $subject;
            
            $this->mailer->isHTML($isHTML);
            $this->mailer->Body = $body;

            return $this->mailer->send();
        } catch (Exception $e) {
            error_log("Mailer Error: {$this->mailer->ErrorInfo}");
            return false;
        }
    }

    /**
     * Get last error message
     */
    public function getError(): string
    {
        return $this->mailer->ErrorInfo ?? 'Unknown error';
    }
}

