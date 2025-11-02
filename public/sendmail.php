<?php
/**
 * Send Mail Handler
 * Processes contact form submissions with PHPMailer, reCAPTCHA v3, and Honeypot protection
 */

// Only allow POST requests
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    echo json_encode(['success' => false, 'message' => 'Method not allowed']);
    exit;
}

// Load dependencies
require_once __DIR__ . '/../includes/functions.php';
$mail_config = load_config('mail_config');
$app_config = load_config('app_config');

// Load PHPMailer classes
require_once __DIR__ . '/../includes/PHPMailer/PHPMailer.php';
require_once __DIR__ . '/../includes/PHPMailer/SMTP.php';
require_once __DIR__ . '/../includes/PHPMailer/Exception.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

// Initialize response
$response = ['success' => false, 'message' => ''];

try {
    // Get and sanitize input
    $name = isset($_POST['name']) ? sanitize_input($_POST['name']) : '';
    $email = isset($_POST['email']) ? sanitize_input($_POST['email']) : '';
    $phone = isset($_POST['phone']) ? sanitize_input($_POST['phone']) : '';
    $message = isset($_POST['message']) ? sanitize_input($_POST['message']) : '';
    $honeypot = isset($_POST['company']) ? $_POST['company'] : '';
    $recaptcha_token = isset($_POST['recaptcha_token']) ? $_POST['recaptcha_token'] : '';
    
    // Check honeypot field (should be empty)
    if (!empty($honeypot)) {
        $response['message'] = 'Spam detected.';
        echo json_encode($response);
        exit;
    }
    
    // Validate required fields
    $validation = validate_contact_form([
        'name' => $name,
        'email' => $email,
        'message' => $message
    ]);
    
    if (!$validation['valid']) {
        $response['message'] = implode(', ', $validation['errors']);
        echo json_encode($response);
        exit;
    }
    
    // Verify reCAPTCHA token
    if (!verify_recaptcha($recaptcha_token, $app_config['recaptcha']['secret_key'])) {
        $response['message'] = 'reCAPTCHA verification failed. Please try again.';
        echo json_encode($response);
        exit;
    }
    
    // Create PHPMailer instance
    $mail = new PHPMailer(true);
    
    // Server settings
    $mail->isSMTP();
    $mail->Host       = $mail_config['smtp_host'];
    $mail->SMTPAuth   = $mail_config['smtp_auth'];
    $mail->Username   = $mail_config['smtp_username'];
    $mail->Password   = $mail_config['smtp_password'];
    $mail->SMTPSecure = $mail_config['smtp_secure'];
    $mail->Port       = $mail_config['smtp_port'];
    $mail->CharSet    = $mail_config['charset'];
    
    // Recipients
    $mail->setFrom($mail_config['from_email'], $mail_config['from_name']);
    $mail->addAddress($mail_config['recipient_email'], $mail_config['recipient_name']);
    $mail->addReplyTo($email, $name);
    
    // Content
    $mail->isHTML(true);
    $mail->Subject = 'New Contact Form Submission from ' . $name;
    
    // HTML email body
    $mail->Body = "
    <html>
    <head>
        <style>
            body { font-family: Arial, sans-serif; line-height: 1.6; color: #333; }
            .container { max-width: 600px; margin: 0 auto; padding: 20px; }
            .header { background: #0099ff; color: white; padding: 20px; text-align: center; }
            .content { background: #f9f9f9; padding: 20px; margin: 20px 0; }
            .field { margin-bottom: 15px; }
            .label { font-weight: bold; color: #0099ff; }
            .value { margin-top: 5px; }
            .footer { text-align: center; font-size: 12px; color: #666; margin-top: 20px; }
        </style>
    </head>
    <body>
        <div class='container'>
            <div class='header'>
                <h2>New Contact Form Submission</h2>
            </div>
            <div class='content'>
                <div class='field'>
                    <div class='label'>Name:</div>
                    <div class='value'>" . htmlspecialchars($name) . "</div>
                </div>
                <div class='field'>
                    <div class='label'>Email:</div>
                    <div class='value'>" . htmlspecialchars($email) . "</div>
                </div>
                " . (!empty($phone) ? "
                <div class='field'>
                    <div class='label'>Phone:</div>
                    <div class='value'>" . htmlspecialchars($phone) . "</div>
                </div>
                " : "") . "
                <div class='field'>
                    <div class='label'>Message:</div>
                    <div class='value'>" . nl2br(htmlspecialchars($message)) . "</div>
                </div>
            </div>
            <div class='footer'>
                <p>This message was sent from the Dimgent Technologies contact form.</p>
                <p>Date: " . date('Y-m-d H:i:s') . "</p>
            </div>
        </div>
    </body>
    </html>
    ";
    
    // Plain text alternative
    $mail->AltBody = "New Contact Form Submission\n\n"
                   . "Name: $name\n"
                   . "Email: $email\n"
                   . (!empty($phone) ? "Phone: $phone\n" : "")
                   . "Message:\n$message\n\n"
                   . "Date: " . date('Y-m-d H:i:s');
    
    // Send email
    $mail->send();
    
    $response['success'] = true;
    $response['message'] = 'Thank you for your message! We will get back to you soon.';
    
} catch (Exception $e) {
    $response['message'] = 'Message could not be sent. Please try again later or contact us directly via email.';
    // Log error for debugging (optional)
    error_log('Mail Error: ' . $e->getMessage());
}

// Return JSON response
header('Content-Type: application/json');
echo json_encode($response);
?>
