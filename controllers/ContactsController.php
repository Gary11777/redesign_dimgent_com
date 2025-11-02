<?php

require_once 'core/Input.php';

/**
 * Contacts Controller
 */
class ContactsController extends BaseController
{
    public function index(): void
    {
        $data = [
            'title' => 'Dimgent Technologies contacts',
            'page' => 'contacts',
            'success' => false,
            'error' => null
        ];

        $this->render('pages/contacts', $data);
    }

    public function submit(): void
    {
        $name = Input::post('name');
        $email = Input::post('email');
        $country = Input::post('country');
        $phone = Input::post('phone');
        $message = Input::post('mess');
        $honeypot = Input::post('website'); // Honeypot field

        $errors = [];

        // Honeypot check
        if (!empty($honeypot)) {
            $errors[] = 'Spam detected';
        }

        // Validation
        if (empty($name)) {
            $errors[] = 'Name is required';
        }

        if (empty($email) || !Input::validateEmail($email)) {
            $errors[] = 'Valid email is required';
        }

        if (empty($message)) {
            $errors[] = 'Message is required';
        }

        // reCAPTCHA verification
        require_once 'core/Recaptcha.php';
        $recaptchaToken = Input::post('g-recaptcha-response');
        if (empty($recaptchaToken)) {
            $errors[] = 'Please complete the reCAPTCHA verification';
        } else {
            try {
                $recaptcha = new Recaptcha();
                if (!$recaptcha->verify($recaptchaToken)) {
                    $errors[] = 'reCAPTCHA verification failed';
                }
            } catch (Exception $e) {
                $errors[] = 'reCAPTCHA verification error';
            }
        }

        if (empty($errors)) {
            // Send email
            require_once 'core/Mailer.php';
            
            try {
                $mailer = new Mailer();
            } catch (Exception $e) {
                $data = [
                    'title' => 'Dimgent Technologies contacts',
                    'page' => 'contacts',
                    'success' => false,
                    'error' => 'Mail service is not configured. Please contact the administrator.'
                ];
                $this->render('pages/contacts', $data);
                return;
            }
            
            $emailBody = "Contact Form Submission\n\n";
            $emailBody .= "Name: {$name}\n";
            $emailBody .= "Email: {$email}\n";
            $emailBody .= "Country: {$country}\n";
            $emailBody .= "Phone: {$phone}\n\n";
            $emailBody .= "Message:\n{$message}\n";

            $toEmail = Config::get('site.email');
            $subject = 'Contact Form Submission from ' . Config::get('site.name');
            
            if ($mailer->send($toEmail, $subject, $emailBody)) {
                $data = [
                    'title' => 'Dimgent Technologies contacts',
                    'page' => 'contacts',
                    'success' => true,
                    'error' => null
                ];
            } else {
                $data = [
                    'title' => 'Dimgent Technologies contacts',
                    'page' => 'contacts',
                    'success' => false,
                    'error' => 'Failed to send message. Please try again later.'
                ];
            }
        } else {
            $data = [
                'title' => 'Dimgent Technologies contacts',
                'page' => 'contacts',
                'success' => false,
                'error' => implode('<br>', $errors)
            ];
        }

        $this->render('pages/contacts', $data);
    }
}

