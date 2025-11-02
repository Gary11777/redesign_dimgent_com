<?php
/**
 * Contacts Controller
 * 
 * Handles the contacts page and form submission
 */

declare(strict_types=1);

namespace App\Controllers;

use App\Core\Controller;
use App\Helpers\Mailer;
use App\Helpers\ReCaptcha;

class ContactsController extends Controller
{
    /**
     * Display contacts page
     */
    public function index(): void
    {
        $data = [
            'page' => 'contacts',
            'title' => 'Dimgent Technologies contacts',
            'meta_description' => 'Dimgent Technologies Development Center: Minsk, Belarus.',
            'recaptcha_site_key' => $this->config['recaptcha']['site_key'],
        ];

        $this->render('contacts/index', $data);
    }

    /**
     * Handle contact form submission
     */
    public function send(): void
    {
        // Only accept POST requests
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            $this->json(['success' => false, 'message' => 'Invalid request method'], 405);
        }

        // Get form data
        $name = $this->sanitize($this->post('name', ''));
        $email = $this->sanitize($this->post('email', ''));
        $phone = $this->sanitize($this->post('phone', ''));
        $country = $this->sanitize($this->post('country', ''));
        $message = $this->sanitize($this->post('message', ''));
        $company = $this->post('company', ''); // Honeypot field
        $recaptchaToken = $this->post('recaptcha_token', '');

        // Validate required fields
        $errors = [];

        if (empty($name)) {
            $errors[] = 'Name is required';
        }

        if (empty($email)) {
            $errors[] = 'Email is required';
        } elseif (!$this->isValidEmail($email)) {
            $errors[] = 'Invalid email address';
        }

        if (empty($message)) {
            $errors[] = 'Message is required';
        }

        // Honeypot check (company field should be empty)
        if (!empty($company)) {
            error_log('Honeypot triggered: ' . $company);
            $this->json(['success' => false, 'message' => 'Invalid submission'], 400);
        }

        // Verify reCAPTCHA
        if (!empty($this->config['recaptcha']['secret_key'])) {
            $recaptcha = new ReCaptcha(
                $this->config['recaptcha']['secret_key'],
                $this->config['recaptcha']['min_score']
            );

            $result = $recaptcha->verify($recaptchaToken, 'contact');

            if (!$result['success']) {
                $this->json([
                    'success' => false,
                    'message' => 'reCAPTCHA verification failed. Please try again.'
                ], 400);
            }
        }

        // Return validation errors
        if (!empty($errors)) {
            $this->json([
                'success' => false,
                'message' => implode(', ', $errors)
            ], 400);
        }

        // Prepare email data
        $emailData = [
            'name' => $name,
            'email' => $email,
            'phone' => $phone,
            'country' => $country,
            'message' => $message,
        ];

        // Send email
        try {
            $mailer = new Mailer($this->config['mail']);
            $sent = $mailer->sendContactForm($emailData);

            if ($sent) {
                $this->json([
                    'success' => true,
                    'message' => 'Thank you for contacting us! We will get back to you soon.'
                ]);
            } else {
                $this->json([
                    'success' => false,
                    'message' => 'Failed to send email. Please try again later.'
                ], 500);
            }
        } catch (\Exception $e) {
            error_log('Contact form error: ' . $e->getMessage());
            $this->json([
                'success' => false,
                'message' => 'An error occurred. Please try again later.'
            ], 500);
        }
    }
}
