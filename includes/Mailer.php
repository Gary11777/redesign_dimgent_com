<?php
/**
 * Mailer Class
 * Handles email sending using PHPMailer
 */

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class Mailer
{
    private PHPMailer $mailer;
    private array $config;
    
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->config = config('mail');
        $this->mailer = new PHPMailer(true);
        $this->configure();
    }
    
    /**
     * Configure PHPMailer with SMTP settings
     * 
     * @return void
     */
    private function configure(): void
    {
        try {
            // Server settings
            $this->mailer->isSMTP();
            $this->mailer->Host = $this->config['smtp']['host'];
            $this->mailer->SMTPAuth = true;
            $this->mailer->Username = $this->config['smtp']['username'];
            $this->mailer->Password = $this->config['smtp']['password'];
            $this->mailer->SMTPSecure = $this->config['smtp']['encryption'];
            $this->mailer->Port = $this->config['smtp']['port'];
            
            // Set charset
            $this->mailer->CharSet = 'UTF-8';
            
            // From email
            $this->mailer->setFrom(
                $this->config['smtp']['from_email'],
                $this->config['smtp']['from_name']
            );
        } catch (Exception $e) {
            error_log("Mailer configuration error: " . $e->getMessage());
            throw $e;
        }
    }
    
    /**
     * Send contact form email
     * 
     * @param array $data Form data
     * @return bool Success status
     */
    public function sendContactForm(array $data): bool
    {
        try {
            // Recipients
            $this->mailer->addAddress($this->config['contact_recipient']);
            $this->mailer->addReplyTo($data['email'], $data['name']);
            
            // Content
            $this->mailer->isHTML(true);
            $this->mailer->Subject = 'Contact Form Submission from ' . $data['name'];
            
            // Email body
            $body = $this->buildContactFormBody($data);
            $this->mailer->Body = $body;
            $this->mailer->AltBody = strip_tags($body);
            
            // Send
            return $this->mailer->send();
            
        } catch (Exception $e) {
            error_log("Email sending error: " . $e->getMessage());
            return false;
        }
    }
    
    /**
     * Build HTML email body for contact form
     * 
     * @param array $data Form data
     * @return string HTML email body
     */
    private function buildContactFormBody(array $data): string
    {
        $html = '<html><body style="font-family: Arial, sans-serif; color: #333;">';
        $html .= '<div style="max-width: 600px; margin: 0 auto; padding: 20px; border: 1px solid #ddd; border-radius: 5px;">';
        $html .= '<h2 style="color: #2563eb; border-bottom: 2px solid #2563eb; padding-bottom: 10px;">New Contact Form Submission</h2>';
        
        $html .= '<table style="width: 100%; margin-top: 20px;">';
        $html .= '<tr><td style="padding: 10px; font-weight: bold; width: 150px;">Name:</td><td style="padding: 10px;">' . htmlspecialchars($data['name']) . '</td></tr>';
        
        if (!empty($data['country'])) {
            $html .= '<tr><td style="padding: 10px; font-weight: bold;">Country:</td><td style="padding: 10px;">' . htmlspecialchars($data['country']) . '</td></tr>';
        }
        
        if (!empty($data['phone'])) {
            $html .= '<tr><td style="padding: 10px; font-weight: bold;">Phone:</td><td style="padding: 10px;">' . htmlspecialchars($data['phone']) . '</td></tr>';
        }
        
        $html .= '<tr><td style="padding: 10px; font-weight: bold;">Email:</td><td style="padding: 10px;"><a href="mailto:' . htmlspecialchars($data['email']) . '">' . htmlspecialchars($data['email']) . '</a></td></tr>';
        $html .= '</table>';
        
        $html .= '<div style="margin-top: 20px; padding: 15px; background-color: #f3f4f6; border-radius: 5px;">';
        $html .= '<p style="margin: 0; font-weight: bold;">Message:</p>';
        $html .= '<p style="margin-top: 10px;">' . nl2br(htmlspecialchars($data['message'])) . '</p>';
        $html .= '</div>';
        
        $html .= '<div style="margin-top: 20px; padding-top: 20px; border-top: 1px solid #ddd; color: #666; font-size: 12px;">';
        $html .= '<p>This email was sent from the Dimgent Technologies contact form at ' . date('Y-m-d H:i:s') . '</p>';
        $html .= '</div>';
        
        $html .= '</div></body></html>';
        
        return $html;
    }
}
