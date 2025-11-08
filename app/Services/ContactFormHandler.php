<?php

declare(strict_types=1);

namespace Services;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use ReCaptcha\ReCaptcha;

class ContactFormHandler
{
    private const MAX_NAME_LENGTH = 100;
    private const MAX_EMAIL_LENGTH = 255;
    private const MAX_SUBJECT_LENGTH = 200;
    private const MAX_MESSAGE_LENGTH = 5000;
    private const RATE_LIMIT_KEY_PREFIX = 'contact_form_';
    private const MAX_ATTEMPTS_PER_HOUR = 3;
    
    private array $config;
    private array $errors = [];
    
    public function __construct(array $config)
    {
        $this->config = $config;
    }
    
    /**
     * Validate and process contact form submission
     */
    public function handle(array $data): array
    {
        // 1. CSRF Protection
        if (!$this->validateCsrfToken($data['csrf_token'] ?? '')) {
            return ['success' => false, 'error' => 'Invalid security token. Please refresh and try again.'];
        }
        
        // 2. Honeypot Check (bot detection)
        if (!empty($data['website'])) {
            // Bot filled honeypot field - fail silently
            return ['success' => false, 'error' => 'Invalid submission.'];
        }
        
        // 3. Rate Limiting
        if (!$this->checkRateLimit()) {
            return ['success' => false, 'error' => 'Too many requests. Please try again later (max 3 per hour).'];
        }
        
        // 4. reCAPTCHA Validation
        if ($this->config['recaptcha']['enabled'] ?? false) {
            if (!$this->validateRecaptcha($data['g-recaptcha-response'] ?? '')) {
                return ['success' => false, 'error' => 'reCAPTCHA verification failed. Please try again.'];
            }
        }
        
        // 5. Validate Input
        $validated = $this->validate($data);
        if (!$validated) {
            return ['success' => false, 'errors' => $this->errors];
        }
        
        // 6. Send Email
        try {
            $this->sendEmail($validated);
            $this->incrementRateLimit();
            
            return [
                'success' => true,
                'message' => 'Thank you! Your message has been sent successfully. We will contact you soon.'
            ];
        } catch (Exception $e) {
            // Log error (don't expose to user)
            error_log('Contact form error: ' . $e->getMessage());
            
            return [
                'success' => false,
                'error' => 'Failed to send message. Please try again later or contact us directly at ' . $this->config['app']['site']['email']
            ];
        }
    }
    
    /**
     * Validate all input fields
     */
    private function validate(array $data): array|false
    {
        $validated = [];
        
        // Name validation
        $name = trim($data['name'] ?? '');
        if (empty($name)) {
            $this->errors['name'] = 'Name is required.';
        } elseif (strlen($name) > self::MAX_NAME_LENGTH) {
            $this->errors['name'] = 'Name is too long (max ' . self::MAX_NAME_LENGTH . ' characters).';
        } elseif (!preg_match('/^[a-zA-Z\s\-\'\.]+$/u', $name)) {
            $this->errors['name'] = 'Name contains invalid characters.';
        } else {
            $validated['name'] = $name;
        }
        
        // Email validation
        $email = trim($data['email'] ?? '');
        if (empty($email)) {
            $this->errors['email'] = 'Email is required.';
        } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $this->errors['email'] = 'Invalid email address.';
        } elseif (strlen($email) > self::MAX_EMAIL_LENGTH) {
            $this->errors['email'] = 'Email is too long.';
        } elseif ($this->isEmailSuspicious($email)) {
            $this->errors['email'] = 'Invalid email address.';
        } else {
            $validated['email'] = $email;
        }
        
        // Subject validation (optional field)
        $subject = trim($data['subject'] ?? 'Contact Form Submission');
        if (strlen($subject) > self::MAX_SUBJECT_LENGTH) {
            $this->errors['subject'] = 'Subject is too long.';
        } else {
            $validated['subject'] = $this->sanitizeHeaderValue($subject);
        }
        
        // Message validation
        $message = trim($data['message'] ?? '');
        if (empty($message)) {
            $this->errors['message'] = 'Message is required.';
        } elseif (strlen($message) < 10) {
            $this->errors['message'] = 'Message is too short (minimum 10 characters).';
        } elseif (strlen($message) > self::MAX_MESSAGE_LENGTH) {
            $this->errors['message'] = 'Message is too long (max ' . self::MAX_MESSAGE_LENGTH . ' characters).';
        } else {
            $validated['message'] = $message;
        }
        
        // Phone validation (optional)
        if (!empty($data['phone'])) {
            $phone = trim($data['phone']);
            if (preg_match('/^[0-9\s\-\+\(\)\.]+$/', $phone)) {
                $validated['phone'] = $phone;
            }
        }
        
        return empty($this->errors) ? $validated : false;
    }
    
    /**
     * Check for email injection attempts
     */
    private function isEmailSuspicious(string $email): bool
    {
        // Check for newlines, carriage returns (email injection)
        if (preg_match("/[\r\n]/", $email)) {
            return true;
        }
        
        // Check for multiple @ signs
        if (substr_count($email, '@') !== 1) {
            return true;
        }
        
        return false;
    }
    
    /**
     * Sanitize email header values to prevent injection
     */
    private function sanitizeHeaderValue(string $value): string
    {
        return str_replace(["\r", "\n", "%0a", "%0d"], '', $value);
    }
    
    /**
     * Validate reCAPTCHA token
     */
    private function validateRecaptcha(string $token): bool
    {
        if (empty($token)) {
            return false;
        }
        
        $recaptcha = new ReCaptcha($this->config['recaptcha']['secret_key']);
        $resp = $recaptcha->setExpectedHostname($_SERVER['SERVER_NAME'])
                          ->verify($token, $_SERVER['REMOTE_ADDR']);
        
        if (!$resp->isSuccess()) {
            return false;
        }
        
        // Check score for v3
        $score = $resp->getScore();
        $threshold = $this->config['recaptcha']['score_threshold'] ?? 0.5;
        
        return $score >= $threshold;
    }
    
    /**
     * Send email using PHPMailer
     */
    private function sendEmail(array $data): void
    {
        $mail = new PHPMailer(true);
        
        try {
            // Server settings
            if ($this->config['mail']['smtp_enabled'] ?? false) {
                $mail->isSMTP();
                $mail->Host = $this->config['mail']['smtp_host'];
                $mail->SMTPAuth = true;
                $mail->Username = $this->config['mail']['smtp_username'];
                $mail->Password = $this->config['mail']['smtp_password'];
                $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
                $mail->Port = $this->config['mail']['smtp_port'] ?? 587;
            } else {
                $mail->isSendmail();
            }
            
            // Recipients
            $mail->setFrom(
                $this->config['mail']['from_email'],
                $this->config['mail']['from_name']
            );
            $mail->addAddress($this->config['app']['site']['email']);
            $mail->addReplyTo($data['email'], $data['name']);
            
            // Content
            $mail->isHTML(true);
            $mail->CharSet = 'UTF-8';
            $mail->Subject = '[Contact Form] ' . $data['subject'];
            $mail->Body = $this->buildHtmlEmail($data);
            $mail->AltBody = $this->buildTextEmail($data);
            
            $mail->send();
        } catch (Exception $e) {
            throw new Exception('Mailer Error: ' . $mail->ErrorInfo);
        }
    }
    
    /**
     * Build HTML email body
     */
    private function buildHtmlEmail(array $data): string
    {
        $name = htmlspecialchars($data['name'], ENT_QUOTES, 'UTF-8');
        $email = htmlspecialchars($data['email'], ENT_QUOTES, 'UTF-8');
        $subject = htmlspecialchars($data['subject'], ENT_QUOTES, 'UTF-8');
        $message = nl2br(htmlspecialchars($data['message'], ENT_QUOTES, 'UTF-8'));
        $phone = !empty($data['phone']) ? htmlspecialchars($data['phone'], ENT_QUOTES, 'UTF-8') : 'Not provided';
        $date = date('F j, Y, g:i a');
        $ip = htmlspecialchars($_SERVER['REMOTE_ADDR'], ENT_QUOTES, 'UTF-8');
        $userAgent = htmlspecialchars($_SERVER['HTTP_USER_AGENT'] ?? 'Unknown', ENT_QUOTES, 'UTF-8');
        
        return <<<HTML
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <style>
        body { font-family: Arial, sans-serif; line-height: 1.6; color: #333; }
        .container { max-width: 600px; margin: 0 auto; padding: 20px; }
        .header { background: #0284c7; color: white; padding: 20px; border-radius: 5px 5px 0 0; }
        .content { background: #f9f9f9; padding: 20px; border: 1px solid #ddd; }
        .field { margin-bottom: 15px; }
        .label { font-weight: bold; color: #555; }
        .value { margin-top: 5px; }
        .footer { margin-top: 20px; padding: 15px; background: #f0f0f0; font-size: 12px; color: #666; }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h2>New Contact Form Submission</h2>
        </div>
        <div class="content">
            <div class="field">
                <div class="label">From:</div>
                <div class="value">{$name}</div>
            </div>
            <div class="field">
                <div class="label">Email:</div>
                <div class="value"><a href="mailto:{$email}">{$email}</a></div>
            </div>
            <div class="field">
                <div class="label">Phone:</div>
                <div class="value">{$phone}</div>
            </div>
            <div class="field">
                <div class="label">Subject:</div>
                <div class="value">{$subject}</div>
            </div>
            <div class="field">
                <div class="label">Message:</div>
                <div class="value">{$message}</div>
            </div>
        </div>
        <div class="footer">
            Received on {$date}<br>
            IP: {$ip}<br>
            User Agent: {$userAgent}
        </div>
    </div>
</body>
</html>
HTML;
    }
    
    /**
     * Build plain text email body
     */
    private function buildTextEmail(array $data): string
    {
        $phone = !empty($data['phone']) ? $data['phone'] : 'Not provided';
        $date = date('F j, Y, g:i a');
        $ip = $_SERVER['REMOTE_ADDR'];
        
        return <<<TEXT
NEW CONTACT FORM SUBMISSION

From: {$data['name']}
Email: {$data['email']}
Phone: {$phone}
Subject: {$data['subject']}

Message:
{$data['message']}

---
Received: {$date}
IP: {$ip}
TEXT;
    }
    
    /**
     * Generate CSRF token
     */
    public function generateCsrfToken(): string
    {
        if (empty($_SESSION['csrf_token'])) {
            $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
        }
        
        return $_SESSION['csrf_token'];
    }
    
    /**
     * Validate CSRF token
     */
    private function validateCsrfToken(string $token): bool
    {
        return !empty($_SESSION['csrf_token']) && hash_equals($_SESSION['csrf_token'], $token);
    }
    
    /**
     * Simple rate limiting (check if user can submit)
     */
    private function checkRateLimit(): bool
    {
        $ip = $_SERVER['REMOTE_ADDR'];
        $key = self::RATE_LIMIT_KEY_PREFIX . md5($ip);
        
        $attempts = $_SESSION[$key] ?? ['count' => 0, 'time' => time()];
        
        // Reset after 1 hour
        if (time() - $attempts['time'] > 3600) {
            $attempts = ['count' => 0, 'time' => time()];
        }
        
        // Max attempts per hour
        if ($attempts['count'] >= self::MAX_ATTEMPTS_PER_HOUR) {
            return false;
        }
        
        $_SESSION[$key] = $attempts;
        return true;
    }
    
    /**
     * Increment rate limit counter
     */
    private function incrementRateLimit(): void
    {
        $ip = $_SERVER['REMOTE_ADDR'];
        $key = self::RATE_LIMIT_KEY_PREFIX . md5($ip);
        
        if (isset($_SESSION[$key])) {
            $_SESSION[$key]['count']++;
        }
    }
    
    /**
     * Get validation errors
     */
    public function getErrors(): array
    {
        return $this->errors;
    }
}
