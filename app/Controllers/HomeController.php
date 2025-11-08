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
            'metaDescription' => $this->config['app']['site']['description'],
            'heroTitle' => $this->config['app']['site']['name'],
            'heroSubtitle' => $this->config['app']['site']['tagline'],
            'heroDescription' => 'Custom electronic devices development in Minsk, Belarus. From concept to finished product.',
            'features' => $this->config['app']['features'],
            'services' => $this->config['app']['services_list'],
            'featuredProduct' => [
                'name' => 'Garand 101',
                'tagline' => 'A high-resolution fluxgate magnetometer',
                'description' => 'Magnetic detection can be easy and convenient! High-resolution fluxgate magnetometer-gradiometer designed to measure disruptions in the Earth\'s magnetic field.',
                'url' => '/products'
            ]
        ];
        
        $this->view('home', $data);
    }
}
