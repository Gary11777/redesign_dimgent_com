<?php
/**
 * Contacts Controller
 * Handles the contacts page and form submission
 */

require_once __DIR__ . '/BaseController.php';
require_once __DIR__ . '/../includes/Mailer.php';

class ContactsController extends BaseController
{
    /**
     * Display contacts page
     * 
     * @return void
     */
    public function index(): void
    {
        $data = [
            'pageTitle' => 'Dimgent Technologies contacts',
            'pageDescription' => 'Dimgent Technologies Development Center: Minsk, Belarus.',
            'pageKeywords' => 'Dimgent Technologies, contacts, email, Belarus, Minsk',
            'includeRecaptcha' => true
        ];
        
        $this->render('contacts', $data);
    }
    
    /**
     * Handle contact form submission
     * 
     * @return void
     */
    public function submit(): void
    {
        if (!$this->isPost()) {
            redirect('/contacts.php');
            return;
        }
        
        // Get form data
        $name = sanitize($this->post('name', ''));
        $country = sanitize($this->post('country', ''));
        $phone = sanitize($this->post('phone', ''));
        $email = sanitize($this->post('email', ''));
        $message = sanitize($this->post('message', ''));
        $honeypot = $this->post('company', ''); // Honeypot field
        $recaptchaToken = $this->post('recaptcha_token', '');
        
        // Validate required fields
        if (empty($name) || empty($email) || empty($message)) {
            setFlash('error', 'Please fill in all required fields.');
            redirect('/contacts.php');
            return;
        }
        
        // Validate email
        if (!validateEmail($email)) {
            setFlash('error', 'Please provide a valid email address.');
            redirect('/contacts.php');
            return;
        }
        
        // Check honeypot (should be empty)
        if (!empty($honeypot)) {
            setFlash('error', 'Spam detected. Please try again.');
            redirect('/contacts.php');
            return;
        }
        
        // Verify reCAPTCHA
        if (!verifyRecaptcha($recaptchaToken)) {
            setFlash('error', 'reCAPTCHA verification failed. Please try again.');
            redirect('/contacts.php');
            return;
        }
        
        // Send email
        try {
            $mailer = new Mailer();
            $success = $mailer->sendContactForm([
                'name' => $name,
                'country' => $country,
                'phone' => $phone,
                'email' => $email,
                'message' => $message
            ]);
            
            if ($success) {
                setFlash('success', 'Thank you for your message! We will get back to you soon.');
            } else {
                setFlash('error', 'Failed to send message. Please try again later.');
            }
        } catch (Exception $e) {
            setFlash('error', 'An error occurred. Please try again later.');
        }
        
        redirect('/contacts.php');
    }
}
