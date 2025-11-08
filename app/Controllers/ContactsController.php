<?php

declare(strict_types=1);

namespace Controllers;

use Core\Controller;

class ContactsController extends Controller
{
    public function index(): void
    {
        $data = [
            'title' => 'Contacts',
            'metaDescription' => 'Contact Dimgent Technologies - Electronics Development in Minsk, Belarus'
        ];

        $this->view('contacts', $data);
    }
}
