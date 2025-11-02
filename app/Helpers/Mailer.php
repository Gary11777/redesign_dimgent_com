<?php
/**
 * Mailer Helper Class
 * 
 * Handles email sending using PHPMailer with SMTP
 */

declare(strict_types=1);

namespace App\Helpers;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

class Mailer
{
    private array $config;
    private PHPMailer $mailer;

    /**
     * Constructor
     */
    public function __construct(array $mailConfig)
    {
        $this->config = $mailConfig;
        $this->initMailer();
    }

    /**
     * Initialize PHPMailer
     */
    private function initMailer(): void
    {
        $this->mailer = new PHPMailer(true);

        // SMTP Configuration
        $this->mailer->isSMTP();
        $this->mailer->Host = $this->config['smtp_host'];
        $this->mailer->SMTPAuth = true;
        $this->mailer->Username = $this->config['smtp_username'];
        $this->mailer->Password = $this->config['smtp_password'];
        $this->mailer->SMTPSecure = $this->config['smtp_encryption'];
        $this->mailer->Port = $this->config['smtp_port'];
        $this->mailer->CharSet = 'UTF-8';

        // Set default from
        $this->mailer->setFrom(
            $this->config['from_email'],
            $this->config['from_name']
        );
    }

    /**
     * Send contact form email
     */
    public function sendContactForm(array $data): bool
    {
        try {
            // Recipients
            $this->mailer->addAddress(
                $this->config['to_email'],
                $this->config['to_name']
            );

            // Reply to customer
            if (!empty($data['email'])) {
                $this->mailer->addReplyTo($data['email'], $data['name'] ?? '');
            }

            // Email content
            $this->mailer->isHTML(true);
            $this->mailer->Subject = 'Contact Form Submission - Dimgent Technologies';
            
            // Build email body
            $body = $this->buildContactEmailBody($data);
            $this->mailer->Body = $body;
            $this->mailer->AltBody = strip_tags($body);

            // Send email
            return $this->mailer->send();
        } catch (Exception $e) {
            error_log("Mailer Error: {$this->mailer->ErrorInfo}");
            return false;
        }
    }

    /**
     * Build contact email body
     */
    private function buildContactEmailBody(array $data): string
    {
        $html = '
        <!DOCTYPE html>
        <html>
        <head>
            <meta charset="UTF-8">
            <style>
                body { font-family: Arial, sans-serif; line-height: 1.6; color: #333; }
                .container { max-width: 600px; margin: 0 auto; padding: 20px; }
                .header { background: #1e3a8a; color: white; padding: 20px; text-align: center; }
                .content { background: #f9fafb; padding: 20px; border: 1px solid #e5e7eb; }
                .field { margin-bottom: 15px; }
                .label { font-weight: bold; color: #1e3a8a; }
                .value { margin-top: 5px; }
                .footer { text-align: center; margin-top: 20px; font-size: 12px; color: #6b7280; }
            </style>
        </head>
        <body>
            <div class="container">
                <div class="header">
                    <h2>New Contact Form Submission</h2>
                </div>
                <div class="content">';

        if (!empty($data['name'])) {
            $html .= '<div class="field">
                <div class="label">Name:</div>
                <div class="value">' . htmlspecialchars($data['name']) . '</div>
            </div>';
        }

        if (!empty($data['email'])) {
            $html .= '<div class="field">
                <div class="label">Email:</div>
                <div class="value">' . htmlspecialchars($data['email']) . '</div>
            </div>';
        }

        if (!empty($data['phone'])) {
            $html .= '<div class="field">
                <div class="label">Phone:</div>
                <div class="value">' . htmlspecialchars($data['phone']) . '</div>
            </div>';
        }

        if (!empty($data['country'])) {
            $html .= '<div class="field">
                <div class="label">Country:</div>
                <div class="value">' . htmlspecialchars($data['country']) . '</div>
            </div>';
        }

        if (!empty($data['message'])) {
            $html .= '<div class="field">
                <div class="label">Message:</div>
                <div class="value">' . nl2br(htmlspecialchars($data['message'])) . '</div>
            </div>';
        }

        $html .= '
                </div>
                <div class="footer">
                    <p>This email was sent from the Dimgent Technologies contact form.</p>
                    <p>Received on: ' . date('Y-m-d H:i:s') . '</p>
                </div>
            </div>
        </body>
        </html>';

        return $html;
    }
}
