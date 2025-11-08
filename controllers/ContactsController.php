<?php

declare(strict_types=1);

require_once 'core/Mailer.php';
require_once 'core/Recaptcha.php';
require_once 'core/RateLimiter.php';

/**
 * Contacts Controller
 * 
 * Implements secure contact form with all security features
 */
class ContactsController extends BaseController
{
    private RateLimiter $rateLimiter;

    public function __construct()
    {
        parent::__construct();
        $this->rateLimiter = new RateLimiter();
    }

    public function index(): void
    {
        $contentFile = Config::get('paths.content') . '/contacts_page_content.txt';
        $content = file_exists($contentFile) ? file_get_contents($contentFile) : '';

        // Get reCAPTCHA site key
        $recaptchaSiteKey = Recaptcha::getSiteKey();

        // Check for success parameter (PRG pattern)
        $success = isset($_GET['success']) && $_GET['success'] == '1';

        $this->render('pages/contacts', [
            'title' => 'Contacts - ' . Config::get('site.name'),
            'page' => 'contacts',
            'content' => $content,
            'recaptcha_site_key' => $recaptchaSiteKey,
            'success' => $success,
            'error' => null,
            'form_data' => []
        ]);
    }

    public function submit(): void
    {
        $ip = Security::getClientIp();
        
        // Rate limiting check
        if (!$this->rateLimiter->isAllowed($ip)) {
            $remaining = $this->rateLimiter->getRemainingAttempts($ip);
            $this->render('pages/contacts', [
                'title' => 'Contacts - ' . Config::get('site.name'),
                'page' => 'contacts',
                'success' => false,
                'error' => 'Too many requests. Please try again later.',
                'form_data' => $_POST
            ]);
            return;
        }

        // CSRF protection
        $csrfToken = $this->post('csrf_token');
        if (!Security::verifyCsrfToken($csrfToken)) {
            $this->render('pages/contacts', [
                'title' => 'Contacts - ' . Config::get('site.name'),
                'page' => 'contacts',
                'success' => false,
                'error' => 'Invalid security token. Please refresh the page and try again.',
                'form_data' => []
            ]);
            return;
        }

        // Honeypot field check
        $honeypot = $this->post('website');
        if (!empty($honeypot)) {
            // Bot detected - silently fail
            $this->redirect('/contacts?success=1');
            return;
        }

        // Get and validate input
        $name = $this->post('name', '');
        $email = $this->post('email', '');
        $country = $this->post('country', '');
        $phone = $this->post('phone', '');
        $message = $this->post('message', '');

        $errors = [];

        // Validate name
        $name = Security::sanitize($name);
        if (empty($name)) {
            $errors[] = 'Name is required';
        } elseif (!Security::validateLength($name, 2, 100)) {
            $errors[] = 'Name must be between 2 and 100 characters';
        } elseif (!Security::validatePattern($name, '/^[a-zA-Z\s\-\.\']+$/u')) {
            $errors[] = 'Name contains invalid characters';
        }

        // Validate email
        $email = Security::sanitize($email);
        if (empty($email)) {
            $errors[] = 'Email is required';
        } elseif (!Security::validateEmail($email)) {
            $errors[] = 'Invalid email address';
        } elseif (!Security::validateLength($email, 5, 255)) {
            $errors[] = 'Email address is too long';
        }

        // Validate country (optional)
        $country = Security::sanitize($country);
        if (!empty($country) && !Security::validateLength($country, 2, 100)) {
            $errors[] = 'Country name is too long';
        }

        // Validate phone (optional)
        $phone = Security::sanitize($phone);
        if (!empty($phone) && !Security::validateLength($phone, 5, 50)) {
            $errors[] = 'Phone number is too long';
        } elseif (!empty($phone) && !Security::validatePattern($phone, '/^[\d\s\-\+\(\)]+$/')) {
            $errors[] = 'Phone number contains invalid characters';
        }

        // Validate message
        $message = Security::sanitize($message);
        if (empty($message)) {
            $errors[] = 'Message is required';
        } elseif (!Security::validateLength($message, 10, 5000)) {
            $errors[] = 'Message must be between 10 and 5000 characters';
        }

        // reCAPTCHA verification
        $recaptchaToken = $this->post('g-recaptcha-response');
        if (empty($recaptchaToken)) {
            $errors[] = 'Please complete the reCAPTCHA verification';
        } else {
            try {
                $recaptcha = new Recaptcha();
                if (!$recaptcha->verify($recaptchaToken, $ip)) {
                    $errors[] = 'reCAPTCHA verification failed';
                }
            } catch (Exception $e) {
                $errors[] = 'reCAPTCHA verification error';
            }
        }

        // If validation failed, show errors
        if (!empty($errors)) {
            $this->render('pages/contacts', [
                'title' => 'Contacts - ' . Config::get('site.name'),
                'page' => 'contacts',
                'success' => false,
                'error' => implode('<br>', $errors),
                'form_data' => [
                    'name' => $name,
                    'email' => $email,
                    'country' => $country,
                    'phone' => $phone,
                    'message' => $message
                ],
                'recaptcha_site_key' => Recaptcha::getSiteKey()
            ]);
            return;
        }

        // Send email
        try {
            $mailer = new Mailer();
            
            $emailBody = "Contact Form Submission\n\n";
            $emailBody .= "Name: " . Security::escape($name) . "\n";
            $emailBody .= "Email: " . Security::escape($email) . "\n";
            $emailBody .= "Country: " . Security::escape($country) . "\n";
            $emailBody .= "Phone: " . Security::escape($phone) . "\n\n";
            $emailBody .= "Message:\n" . Security::escape($message) . "\n";
            $emailBody .= "\n---\n";
            $emailBody .= "IP Address: " . $ip . "\n";
            $emailBody .= "Submitted: " . date('Y-m-d H:i:s') . "\n";

            $toEmail = Config::get('site.email');
            $subject = 'Contact Form Submission from ' . Config::get('site.name');
            
            if ($mailer->send($toEmail, $subject, $emailBody)) {
                // PRG Pattern - Post/Redirect/Get
                $this->redirect('/contacts?success=1');
            } else {
                throw new Exception('Failed to send email');
            }
        } catch (Exception $e) {
            $this->render('pages/contacts', [
                'title' => 'Contacts - ' . Config::get('site.name'),
                'page' => 'contacts',
                'success' => false,
                'error' => 'Failed to send message. Please try again later.',
                'form_data' => [
                    'name' => $name,
                    'email' => $email,
                    'country' => $country,
                    'phone' => $phone,
                    'message' => $message
                ],
                'recaptcha_site_key' => Recaptcha::getSiteKey()
            ]);
        }
    }
}

