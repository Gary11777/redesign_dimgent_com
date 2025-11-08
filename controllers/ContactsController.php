<?php

declare(strict_types=1);

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
        $contentFile = Config::get('paths.content', 'drafts/content') . '/contacts_page_content.txt';
        $content = file_exists($contentFile) ? file_get_contents($contentFile) : '';

        $this->render('pages/contacts', [
            'title' => 'Contacts - ' . Config::get('site.name'),
            'page' => 'contacts',
            'content' => $content,
            'recaptcha_site_key' => Recaptcha::getSiteKey(),
            'success' => $this->get('success') === '1',
            'error' => null,
            'form_data' => [
                'name' => '',
                'email' => '',
                'country' => '',
                'phone' => '',
                'message' => '',
            ],
        ]);
    }

    public function submit(): void
    {
        $ip = Security::getClientIp();

        if (!$this->rateLimiter->isAllowed($ip)) {
            $this->renderError('Too many requests. Please try again later.');
            return;
        }

        $csrfToken = $this->post(Config::get('security.csrf_token_name', 'csrf_token'));
        if (!Security::verifyCsrfToken($csrfToken)) {
            $this->renderError('Invalid security token. Please refresh the page and try again.');
            return;
        }

        if ($this->post('website')) { // Honeypot field
            $this->redirect('/contacts?success=1');
            return;
        }

        $name = Security::sanitize((string) $this->post('name', ''));
        $email = Security::sanitize((string) $this->post('email', ''));
        $country = Security::sanitize((string) $this->post('country', ''));
        $phone = Security::sanitize((string) $this->post('phone', ''));
        $message = Security::sanitize((string) $this->post('message', ''));

        $errors = [];

        if ($name === '' || !Security::validateLength($name, 2, 100) || !Security::validatePattern($name, '/^[a-zA-Z\s\-\.\']+$/u')) {
            $errors[] = 'Please enter a valid name.';
        }

        if ($email === '' || !Security::validateEmail($email) || !Security::validateLength($email, 5, 255)) {
            $errors[] = 'Please enter a valid email address.';
        }

        if ($country !== '' && !Security::validateLength($country, 2, 100)) {
            $errors[] = 'Country value is too long.';
        }

        if ($phone !== '' && (!Security::validateLength($phone, 5, 50) || !Security::validatePattern($phone, '/^[0-9\s\-\+\(\)]+$/'))) {
            $errors[] = 'Phone number contains invalid characters.';
        }

        if ($message === '' || !Security::validateLength($message, 10, 5000)) {
            $errors[] = 'Message must be between 10 and 5000 characters.';
        }

        $recaptchaToken = (string) $this->post('g-recaptcha-response', '');
        if ($recaptchaToken === '') {
            $errors[] = 'Please complete the reCAPTCHA verification.';
        } else {
            try {
                $recaptcha = new Recaptcha();
                if (!$recaptcha->verify($recaptchaToken, $ip)) {
                    $errors[] = 'reCAPTCHA verification failed.';
                }
            } catch (RuntimeException $e) {
                $errors[] = 'Unable to verify reCAPTCHA. Please try again later.';
            }
        }

        if (!empty($errors)) {
            $this->render('pages/contacts', [
                'title' => 'Contacts - ' . Config::get('site.name'),
                'page' => 'contacts',
                'content' => file_get_contents(Config::get('paths.content', 'drafts/content') . '/contacts_page_content.txt'),
                'recaptcha_site_key' => Recaptcha::getSiteKey(),
                'success' => false,
                'error' => implode('<br>', $errors),
                'form_data' => compact('name', 'email', 'country', 'phone', 'message'),
            ]);
            return;
        }

        try {
            $mailer = new Mailer();
            $body = "Contact form submission\n\n" .
                'Name: ' . $name . "\n" .
                'Email: ' . $email . "\n" .
                'Country: ' . $country . "\n" .
                'Phone: ' . $phone . "\n\n" .
                "Message:\n" . $message . "\n\n" .
                'IP Address: ' . $ip . "\n" .
                'Submitted at: ' . date('Y-m-d H:i:s');

            $to = Config::get('site.email', 'info@dimgent.com');
            $subject = 'Contact Form Submission from ' . Config::get('site.name', 'Dimgent Technologies');

            if (!$mailer->send($to, $subject, $body)) {
                throw new RuntimeException('Unable to send message.');
            }
        } catch (Throwable $e) {
            $this->render('pages/contacts', [
                'title' => 'Contacts - ' . Config::get('site.name'),
                'page' => 'contacts',
                'content' => file_get_contents(Config::get('paths.content', 'drafts/content') . '/contacts_page_content.txt'),
                'recaptcha_site_key' => Recaptcha::getSiteKey(),
                'success' => false,
                'error' => 'Failed to send message. Please try again later.',
                'form_data' => compact('name', 'email', 'country', 'phone', 'message'),
            ]);
            return;
        }

        $this->redirect('/contacts?success=1');
    }

    private function renderError(string $message): void
    {
        $this->render('pages/contacts', [
            'title' => 'Contacts - ' . Config::get('site.name'),
            'page' => 'contacts',
            'content' => file_get_contents(Config::get('paths.content', 'drafts/content') . '/contacts_page_content.txt'),
            'recaptcha_site_key' => Recaptcha::getSiteKey(),
            'success' => false,
            'error' => $message,
            'form_data' => [
                'name' => (string) $this->post('name', ''),
                'email' => (string) $this->post('email', ''),
                'country' => (string) $this->post('country', ''),
                'phone' => (string) $this->post('phone', ''),
                'message' => (string) $this->post('message', ''),
            ],
        ]);
    }
}
