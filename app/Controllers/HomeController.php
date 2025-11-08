<?php

declare(strict_types=1);

namespace Controllers;

use Core\Controller;

class HomeController extends Controller
{
    public function index(): void
    {
        $data = [
            'title' => 'Home',
            'metaDescription' => 'Dimgent Technologies - Electronics Development. Custom electronic devices development in Minsk, Belarus',
            'heroTitle' => 'Dimgent Technologies',
            'heroSubtitle' => 'Electronics Development',
            'heroDescription' => 'A group of specialists working in the development of electronic devices. Full-cycle development from concept to finished product.'
        ];

        $this->view('home', $data);
    }
}
