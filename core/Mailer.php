<?php

/**
 * Mailer
 * 
 * Handles email sending using PHPMailer with SMTP
 */
class Mailer
{
    private $mailer;

    public function __construct()
    {
        // Load PHPMailer only when needed
        $autoloadPath = __DIR__ . '/../vendor/autoload.php';
        
        if (!file_exists($autoloadPath)) {
            throw new Exception(
                'PHPMailer is not installed. Please run "composer install" to install dependencies.'
            );
        }

        require_once $autoloadPath;

        if (!class_exists('PHPMailer\PHPMailer\PHPMailer')) {
            throw new Exception('PHPMailer class not found. Please run "composer install".');
        }

        $this->mailer = new \PHPMailer\PHPMailer\PHPMailer(true);
        $this->configure();
    }

    /**
     * Configure PHPMailer with SMTP settings
     */
    private function configure(): void
    {
        $this->mailer->isSMTP();
        $this->mailer->Host = Config::get('smtp.host');
        $this->mailer->SMTPAuth = true;
        $this->mailer->Username = Config::get('smtp.username');
        $this->mailer->Password = Config::get('smtp.password');
        $this->mailer->SMTPSecure = Config::get('smtp.encryption', 'tls');
        $this->mailer->Port = Config::get('smtp.port', 587);
        $this->mailer->CharSet = 'UTF-8';
        $this->mailer->setFrom(
            Config::get('smtp.from_email'),
            Config::get('smtp.from_name')
        );
    }

    /**
     * Send email
     */
    public function send(string $to, string $subject, string $body, bool $isHTML = false): bool
    {
        try {
            $this->mailer->clearAddresses();
            $this->mailer->addAddress($to);
            $this->mailer->Subject = $subject;
            $this->mailer->isHTML($isHTML);
            $this->mailer->Body = $body;

            return $this->mailer->send();
        } catch (\PHPMailer\PHPMailer\Exception $e) {
            error_log("Mailer Error: {$this->mailer->ErrorInfo}");
            return false;
        } catch (\Exception $e) {
            error_log("Mailer Error: " . $e->getMessage());
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

