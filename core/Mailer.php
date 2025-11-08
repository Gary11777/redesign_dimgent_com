<?php

declare(strict_types=1);

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception as MailException;

/**
 * Mailer
 *
 * Handles email sending using PHPMailer with SMTP
 */
class Mailer
{
    private PHPMailer $mailer;
    private array $config;

    public function __construct()
    {
        $configFile = Config::get('mail.config_file', 'config/mail.json');
        if (!file_exists($configFile)) {
            throw new RuntimeException('Mail configuration file not found.');
        }

        $configData = json_decode(file_get_contents($configFile), true);
        if (!is_array($configData)) {
            throw new RuntimeException('Invalid mail configuration.');
        }
        $this->config = $configData;

        $autoload = __DIR__ . '/../vendor/autoload.php';
        if (!file_exists($autoload)) {
            throw new RuntimeException('Composer autoload not found. Run composer install.');
        }
        require_once $autoload;

        if (!class_exists(PHPMailer::class)) {
            throw new RuntimeException('PHPMailer not available. Install phpmailer/phpmailer package.');
        }

        $this->mailer = new PHPMailer(true);
        $this->configure();
    }

    private function configure(): void
    {
        $this->mailer->isSMTP();
        $this->mailer->Host = $this->config['host'] ?? '';
        $this->mailer->SMTPAuth = true;
        $this->mailer->Username = $this->config['username'] ?? '';
        $this->mailer->Password = $this->config['password'] ?? '';
        $this->mailer->SMTPSecure = $this->config['encryption'] ?? PHPMailer::ENCRYPTION_STARTTLS;
        $this->mailer->Port = $this->config['port'] ?? 587;
        $this->mailer->CharSet = 'UTF-8';

        $fromEmail = $this->sanitizeEmail($this->config['from_email'] ?? '');
        $fromName = $this->sanitizeHeader($this->config['from_name'] ?? '');

        $this->mailer->setFrom($fromEmail, $fromName);
    }

    /**
     * Sanitize email to prevent header injection
     */
    private function sanitizeEmail(string $email): string
    {
        $email = str_replace(["\r", "\n", "%0a", "%0d"], '', $email);
        $email = filter_var($email, FILTER_SANITIZE_EMAIL);
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            throw new RuntimeException('Invalid email address.');
        }
        return $email;
    }

    private function sanitizeHeader(string $value): string
    {
        return trim(preg_replace('/[\r\n]+/', '', $value));
    }

    /**
     * Send an email
     */
    public function send(string $to, string $subject, string $body): bool
    {
        try {
            $this->mailer->clearAddresses();
            $this->mailer->addAddress($this->sanitizeEmail($to));
            $this->mailer->Subject = $this->sanitizeHeader($subject);
            $this->mailer->Body = $body;
            $this->mailer->isHTML(false);

            return $this->mailer->send();
        } catch (MailException $e) {
            error_log('Mailer error: ' . $e->getMessage());
            return false;
        }
    }

    public function getError(): string
    {
        return $this->mailer->ErrorInfo ?: 'Unknown mailer error';
    }
}
