<?php

declare(strict_types=1);

namespace Controllers;

use Core\Controller;
use Services\ContactFormHandler;

class ContactsController extends Controller
{
    public function index(): void
    {
        $formHandler = new ContactFormHandler($this->config);
        
        $data = [
            'title' => 'Contact Us',
            'metaDescription' => 'Get in touch with Dimgent Technologies. Send us a message and we will respond shortly.',
            'csrf_token' => $formHandler->generateCsrfToken(),
            'recaptcha_site_key' => $this->config['recaptcha']['site_key'] ?? '',
            'recaptcha_enabled' => $this->config['recaptcha']['enabled'] ?? false,
            'success' => !empty($_GET['success']),
            'success_message' => $_SESSION['contact_success'] ?? null,
            'errors' => [],
            'old' => []
        ];
        
        // Clear success message after showing
        if (isset($_SESSION['contact_success'])) {
            unset($_SESSION['contact_success']);
        }
        
        $this->view('contacts', $data);
    }
    
    public function submit(): void
    {
        $formHandler = new ContactFormHandler($this->config);
        $result = $formHandler->handle($_POST);
        
        if ($result['success']) {
            // PRG Pattern: Post/Redirect/Get
            $_SESSION['contact_success'] = $result['message'];
            $this->redirect('/contacts?success=1');
        } else {
            // Show form again with errors
            $data = [
                'title' => 'Contact Us',
                'metaDescription' => 'Get in touch with Dimgent Technologies. Send us a message and we will respond shortly.',
                'csrf_token' => $formHandler->generateCsrfToken(),
                'recaptcha_site_key' => $this->config['recaptcha']['site_key'] ?? '',
                'recaptcha_enabled' => $this->config['recaptcha']['enabled'] ?? false,
                'success' => false,
                'success_message' => null,
                'errors' => $result['errors'] ?? [],
                'error_message' => $result['error'] ?? null,
                'old' => $_POST // Keep form data
            ];
            
            $this->view('contacts', $data);
        }
    }
}
